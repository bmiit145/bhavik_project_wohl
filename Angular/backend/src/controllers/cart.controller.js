const CartItem = require('../models/cart-item.model');
const Product = require('../models/product.model');

async function getCart(req, res) {
  try {
    const userId = req.user.userId;
    const cartItems = await CartItem.find({ userId }).sort({ createdAt: -1 }).lean();
    const productIds = [...new Set(cartItems.map((item) => item.productId))];
    const products = await Product.find({ id: { $in: productIds } }).select('-_id').lean();
    const productById = new Map(products.map((product) => [product.id, product]));

    const orderedProducts = cartItems
      .map((item) => productById.get(item.productId))
      .filter(Boolean);

    return res.json(orderedProducts);
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch cart' });
  }
}

async function addToCart(req, res) {
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

    await CartItem.create({ userId, productId });
    return res.status(201).json({ message: 'Added to cart', data: product });
  } catch (error) {
    return res.status(500).json({ message: 'Failed to add item to cart' });
  }
}

async function removeFromCart(req, res) {
  const id = Number(req.params.id);
  if (!Number.isInteger(id)) {
    return res.status(400).json({ message: 'Invalid product id' });
  }

  try {
    const userId = req.user.userId;
    const deleted = await CartItem.findOneAndDelete({ userId, productId: id }, { sort: { createdAt: -1 } });
    if (!deleted) {
      return res.status(404).json({ message: 'Item not found in cart' });
    }

    return res.json({ message: 'Removed from cart' });
  } catch (error) {
    return res.status(500).json({ message: 'Failed to remove item from cart' });
  }
}

async function clearCart(req, res) {
  try {
    const userId = req.user.userId;
    await CartItem.deleteMany({ userId });
    return res.json({ message: 'Cart cleared' });
  } catch (error) {
    return res.status(500).json({ message: 'Failed to clear cart' });
  }
}

module.exports = { getCart, addToCart, removeFromCart, clearCart };
