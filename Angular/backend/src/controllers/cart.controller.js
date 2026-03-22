const mongoose = require('mongoose');
const CartItem = require('../models/cart-item.model');
const Product = require('../models/product.model');

async function getCart(req, res) {
  try {
    const userId = new mongoose.Types.ObjectId(req.user.userId);
    const cartItems = await CartItem.find({ userId }).sort({ createdAt: -1 }).lean();
    const productIds = cartItems.map((item) => item.productId);
    const products = await Product.find({ id: { $in: productIds } }).select('-_id').lean();
    const productById = new Map(products.map((product) => [product.id, product]));

    const itemsWithQuantity = cartItems
      .map((item) => {
        const product = productById.get(item.productId);
        if (!product) return null;
        return { ...product, quantity: item.quantity };
      })
      .filter(Boolean);

    return res.json(itemsWithQuantity);
  } catch (error) {
    console.error('getCart error:', error);
    return res.status(500).json({ message: 'Failed to fetch cart' });
  }
}

async function addToCart(req, res) {
  try {
    const productId = Number(req.body.productId);
    const userId = new mongoose.Types.ObjectId(req.user.userId);

    if (isNaN(productId)) {
      return res.status(400).json({ message: 'Invalid productId' });
    }

    const product = await Product.findOne({ id: productId }).select('-_id').lean();
    if (!product) {
      return res.status(404).json({ message: 'Product not found' });
    }

    const cartItem = await CartItem.findOneAndUpdate(
      { userId, productId },
      { $inc: { quantity: 1 } },
      { upsert: true, new: true }
    );
    
    return res.status(201).json({ message: 'Added to cart', data: { ...product, quantity: cartItem.quantity } });
  } catch (error) {
    console.error('addToCart error:', error);
    return res.status(500).json({ message: 'Failed to add item to cart' });
  }
}

async function removeFromCart(req, res) {
  try {
    const productId = Number(req.params.id);
    const userId = new mongoose.Types.ObjectId(req.user.userId);

    if (isNaN(productId)) {
      return res.status(400).json({ message: 'Invalid product id' });
    }

    const deleted = await CartItem.findOneAndDelete({ userId, productId });
    if (!deleted) {
      return res.status(404).json({ message: 'Item not found in cart' });
    }

    return res.status(200).json({ message: 'Removed from cart' });
  } catch (error) {
    console.error('removeFromCart error:', error);
    return res.status(500).json({ message: 'Failed to remove from cart' });
  }
}

async function updateCartItem(req, res) {
  try {
    const productId = Number(req.params.id);
    const quantity = Number(req.body.quantity);

    if (isNaN(productId) || isNaN(quantity) || quantity < 1) {
      return res.status(400).json({ message: 'Invalid productId or quantity' });
    }

    const userId = new mongoose.Types.ObjectId(req.user.userId);
    const updated = await CartItem.findOneAndUpdate(
      { userId, productId },
      { quantity },
      { new: true }
    );

    if (!updated) {
      return res.status(404).json({ message: 'Item not found in cart' });
    }

    return res.json({ message: 'Cart updated', data: updated });
  } catch (error) {
    console.error('updateCartItem error:', error);
    return res.status(500).json({ message: 'Failed to update cart' });
  }
}

async function clearCart(req, res) {
  try {
    const userId = new mongoose.Types.ObjectId(req.user.userId);
    await CartItem.deleteMany({ userId });
    return res.json({ message: 'Cart cleared' });
  } catch (error) {
    console.error('clearCart error:', error);
    return res.status(500).json({ message: 'Failed to clear cart' });
  }
}

module.exports = { getCart, addToCart, removeFromCart, updateCartItem, clearCart };
