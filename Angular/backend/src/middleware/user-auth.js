const jwt = require('jsonwebtoken');

const defaultSecret = 'wohl-dev-secret';

function requireUser(req, res, next) {
  const authHeader = req.header('authorization') || '';
  const [scheme, token] = authHeader.split(' ');

  if (scheme !== 'Bearer' || !token) {
    return res.status(401).json({ message: 'Authentication required' });
  }

  try {
    const jwtSecret = process.env.JWT_SECRET || defaultSecret;
    const payload = jwt.verify(token, jwtSecret);
    req.user = {
      userId: payload.sub,
      email: payload.email,
      role: payload.role
    };
    return next();
  } catch (error) {
    return res.status(401).json({ message: 'Invalid or expired token' });
  }
}

module.exports = { requireUser };
