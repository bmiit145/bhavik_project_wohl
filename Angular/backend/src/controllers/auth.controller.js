function login(req, res) {
  const { email } = req.body;
  res.json({ accessToken: 'demo-token', user: { id: 1, name: 'Demo User', email } });
}

function register(req, res) {
  res.status(201).json({ message: 'User registered', user: req.body });
}

module.exports = { login, register };
