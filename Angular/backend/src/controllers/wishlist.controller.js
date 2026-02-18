const { wishlist, products } = require('../data/mock-db');

function getWishlist(_, res) {
  return res.json(wishlist);
}

function addWishlist(req, res) {
  const productId = Number(req.body.productId);
  if (!Number.isInteger(productId)) {
    return res.status(400).json({ message: 'Invalid productId' });
  }

  const product = products.find((item) => item.id === productId);
  if (!product) {
    return res.status(404).json({ message: 'Product not found' });
  }

  const existing = wishlist.find((item) => item.id === productId);
  if (existing) {
    return res.json({ message: 'Already in wishlist', data: existing });
  }

  wishlist.push(product);
  return res.status(201).json({ message: 'Added to wishlist', data: product });
}

module.exports = { getWishlist, addWishlist };
