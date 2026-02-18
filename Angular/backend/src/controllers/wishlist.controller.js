const { wishlist, products } = require('../data/mock-db');

function getWishlist(_, res) {
  res.json(wishlist);
}

function addWishlist(req, res) {
  const { productId } = req.body;
  const product = products.find((item) => item.id === Number(productId));
  if (!product) return res.status(404).json({ message: 'Product not found' });
  wishlist.push(product);
  return res.status(201).json({ message: 'Added to wishlist', data: product });
}

module.exports = { getWishlist, addWishlist };
