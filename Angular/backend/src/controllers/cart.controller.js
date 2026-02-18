const { cart, products } = require('../data/mock-db');

function getCart(_, res) {
  res.json(cart);
}

function addToCart(req, res) {
  const { productId } = req.body;
  const product = products.find((item) => item.id === Number(productId));
  if (!product) return res.status(404).json({ message: 'Product not found' });
  cart.push(product);
  return res.status(201).json({ message: 'Added to cart', data: product });
}

function removeFromCart(req, res) {
  const id = Number(req.params.id);
  const idx = cart.findIndex((item) => item.id === id);
  if (idx === -1) return res.status(404).json({ message: 'Item not found in cart' });
  cart.splice(idx, 1);
  return res.json({ message: 'Removed from cart' });
}

module.exports = { getCart, addToCart, removeFromCart };
