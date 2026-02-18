const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const User = require('../models/user.model');

const defaultSecret = 'wohl-dev-secret';

function signToken(user) {
  const jwtSecret = process.env.JWT_SECRET || defaultSecret;
  return jwt.sign(
    {
      sub: user._id.toString(),
      role: user.role,
      email: user.email
    },
    jwtSecret,
    { expiresIn: '7d' }
  );
}

async function login(req, res) {
  try {
    const email = String(req.body.email || '').trim().toLowerCase();
    const password = String(req.body.password || '');

    if (!email || !password) {
      return res.status(400).json({ message: 'Email and password are required' });
    }

    const user = await User.findOne({ email });
    if (!user) {
      return res.status(401).json({ message: 'Invalid email or password' });
    }

    const validPassword = await bcrypt.compare(password, user.passwordHash);
    if (!validPassword) {
      return res.status(401).json({ message: 'Invalid email or password' });
    }

    const accessToken = signToken(user);
    return res.json({
      accessToken,
      user: {
        id: user._id,
        fullName: user.fullName,
        email: user.email,
        role: user.role
      }
    });
  } catch (error) {
    return res.status(500).json({ message: 'Failed to login' });
  }
}

async function register(req, res) {
  try {
    const fullName = String(req.body.fullName || '').trim();
    const email = String(req.body.email || '').trim().toLowerCase();
    const password = String(req.body.password || '');

    if (!fullName || !email || !password) {
      return res.status(400).json({ message: 'Full name, email and password are required' });
    }

    if (password.length < 6) {
      return res.status(400).json({ message: 'Password must be at least 6 characters' });
    }

    const existing = await User.findOne({ email }).lean();
    if (existing) {
      return res.status(409).json({ message: 'Email already registered' });
    }

    const passwordHash = await bcrypt.hash(password, 10);
    const user = await User.create({
      fullName,
      email,
      passwordHash,
      role: 'customer'
    });

    return res.status(201).json({
      message: 'User registered',
      user: {
        id: user._id,
        fullName: user.fullName,
        email: user.email,
        role: user.role
      }
    });
  } catch (error) {
    return res.status(500).json({ message: 'Failed to register user' });
  }
}

module.exports = { login, register };
