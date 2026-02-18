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

async function getProductById(req, res) {
  try {
    const id = Number(req.params.id);
    if (!Number.isInteger(id)) {
      return res.status(400).json({ message: 'Invalid product id' });
    }

    const product = await Product.findOne({ id }).select('-_id').lean();
    if (!product) {
      return res.status(404).json({ message: 'Product not found' });
    }

    return res.json(product);
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch product details' });
  }
}

module.exports = { listProducts, getProductById };
