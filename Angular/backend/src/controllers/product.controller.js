const { products } = require('../data/mock-db');

function listProducts(req, res) {
  try {
    const { category } = req.query;
    const filtered = category ? products.filter((product) => product.category === category) : products;
    return res.json(filtered.sort((a, b) => a.id - b.id));
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch products' });
  }
}

function getProductById(req, res) {
  try {
    const id = Number(req.params.id);
    if (!Number.isInteger(id)) {
      return res.status(400).json({ message: 'Invalid product id' });
    }

    const product = products.find((item) => item.id === id);
    if (!product) {
      return res.status(404).json({ message: 'Product not found' });
    }

    return res.json(product);
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch product details' });
  }
}

module.exports = { listProducts, getProductById };
