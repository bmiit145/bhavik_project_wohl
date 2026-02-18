const Product = require('../models/product.model');

async function listProducts(req, res) {
  try {
    const { category } = req.query;
    const filter = category ? { category } : {};
    const products = await Product.find(filter).sort({ id: 1 }).select('-_id').lean();
    return res.json(products);
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch products' });
  }
}

module.exports = { listProducts };
