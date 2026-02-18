const WishlistItem = require('../models/wishlist-item.model');
const Product = require('../models/product.model');

async function getWishlist(_, res) {
  try {
    const wishlistItems = await WishlistItem.find().sort({ createdAt: -1 }).lean();
    const productIds = [...new Set(wishlistItems.map((item) => item.productId))];
    const products = await Product.find({ id: { $in: productIds } }).select('-_id').lean();
    const productsById = new Map(products.map((product) => [product.id, product]));
    const orderedProducts = wishlistItems
      .map((item) => productsById.get(item.productId))
      .filter(Boolean);
    return res.json(orderedProducts);
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch wishlist' });
  }
}

async function addWishlist(req, res) {
  try {
    const productId = Number(req.body.productId);
    if (!Number.isInteger(productId)) {
      return res.status(400).json({ message: 'Invalid productId' });
    }

    const product = await Product.findOne({ id: productId }).select('-_id').lean();
    if (!product) return res.status(404).json({ message: 'Product not found' });

    const existing = await WishlistItem.findOne({ productId }).lean();
    if (existing) {
      return res.json({ message: 'Already in wishlist', data: product });
    }

    await WishlistItem.create({ productId });
    return res.status(201).json({ message: 'Added to wishlist', data: product });
  } catch (error) {
    return res.status(500).json({ message: 'Failed to add item to wishlist' });
  }
}

module.exports = { getWishlist, addWishlist };
