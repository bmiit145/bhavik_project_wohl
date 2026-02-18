const { products } = require('../data/mock-db');

function listProducts(req, res) {
  const { category } = req.query;
  if (!category) return res.json(products);
  return res.json(products.filter((item) => item.category === category));
}

module.exports = { listProducts };
