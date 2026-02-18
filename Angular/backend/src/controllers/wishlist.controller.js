const WishlistItem = require('../models/wishlist-item.model');
const Product = require('../models/product.model');

async function getWishlist(req, res) {
  try {
    const userId = req.user.userId;
    const wishlistItems = await WishlistItem.find({ userId }).sort({ createdAt: -1 }).lean();
    const productIds = [...new Set(wishlistItems.map((item) => item.productId))];
    const products = await Product.find({ id: { $in: productIds } }).select('-_id').lean();
    const productById = new Map(products.map((product) => [product.id, product]));

    const orderedProducts = wishlistItems
      .map((item) => productById.get(item.productId))
      .filter(Boolean);

    return res.json(orderedProducts);
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch wishlist' });
  }
}

async function addWishlist(req, res) {
  const productId = Number(req.body.productId);
  if (!Number.isInteger(productId)) {
    return res.status(400).json({ message: 'Invalid productId' });
  }

  try {
    const userId = req.user.userId;
    const product = await Product.findOne({ id: productId }).select('-_id').lean();
    if (!product) {
      return res.status(404).json({ message: 'Product not found' });
    }

    const existing = await WishlistItem.findOne({ userId, productId }).lean();
    if (existing) {
      return res.json({ message: 'Already in wishlist', data: product });
    }

    await WishlistItem.create({ userId, productId });
    return res.status(201).json({ message: 'Added to wishlist', data: product });
  } catch (error) {
    if (error?.code === 11000) {
      const userId = req.user.userId;
      const product = await Product.findOne({ id: productId }).select('-_id').lean();
      const existing = await WishlistItem.findOne({ userId, productId }).lean();
      if (existing && product) {
        return res.json({ message: 'Already in wishlist', data: product });
      }
    }
    return res.status(500).json({ message: 'Failed to add item to wishlist' });
  }
}

async function removeWishlist(req, res) {
  const productId = Number(req.params.id);
  if (!Number.isInteger(productId)) {
    return res.status(400).json({ message: 'Invalid product id' });
  }

  try {
    const userId = req.user.userId;
    const deleted = await WishlistItem.findOneAndDelete({ userId, productId });
    if (!deleted) {
      return res.status(404).json({ message: 'Item not found in wishlist' });
    }
    return res.json({ message: 'Removed from wishlist' });
  } catch (error) {
    return res.status(500).json({ message: 'Failed to remove wishlist item' });
  }
}

module.exports = { getWishlist, addWishlist, removeWishlist };
