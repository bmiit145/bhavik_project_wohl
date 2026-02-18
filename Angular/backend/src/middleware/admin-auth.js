const adminToken = process.env.ADMIN_TOKEN || 'admin-secret';

function requireAdmin(req, res, next) {
  const token = req.header('x-admin-token');

  if (!token || token !== adminToken) {
    return res.status(401).json({ message: 'Unauthorized admin access' });
  }

  return next();
}

module.exports = { requireAdmin };
