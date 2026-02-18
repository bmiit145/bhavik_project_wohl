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

module.exports = { listProducts };
