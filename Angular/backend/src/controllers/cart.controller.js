const { cart, products } = require('../data/mock-db');

function getCart(_, res) {
  return res.json(cart);
}

function addToCart(req, res) {
  const productId = Number(req.body.productId);
  if (!Number.isInteger(productId)) {
    return res.status(400).json({ message: 'Invalid productId' });
  }

  const product = products.find((item) => item.id === productId);
  if (!product) {
    return res.status(404).json({ message: 'Product not found' });
  }

  cart.push(product);
  return res.status(201).json({ message: 'Added to cart', data: product });
}

function removeFromCart(req, res) {
  const id = Number(req.params.id);
  if (!Number.isInteger(id)) {
    return res.status(400).json({ message: 'Invalid product id' });
  }

  const index = cart.findIndex((item) => item.id === id);
  if (index < 0) {
    return res.status(404).json({ message: 'Item not found in cart' });
  }

  cart.splice(index, 1);
  return res.json({ message: 'Removed from cart' });
}

module.exports = { getCart, addToCart, removeFromCart };
