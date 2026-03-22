const Order = require('../models/order.model');

async function checkout(req, res) {
  try {
    const payload = req.body;
    
    // 1. Validation
    if (!payload.customerName || !payload.customerName.trim()) {
      return res.status(400).json({ message: 'Customer name is required' });
    }
    if (!payload.address || !payload.address.trim()) {
      return res.status(400).json({ message: 'Delivery address is required' });
    }
    if (!payload.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(payload.email)) {
      return res.status(400).json({ message: 'Valid email is required' });
    }
    if (!payload.items || !Array.isArray(payload.items) || payload.items.length === 0) {
      return res.status(400).json({ message: 'Cart cannot be empty' });
    }

    const maxOrder = await Order.findOne({}).sort({ id: -1 }).select('id -_id').lean();
    const nextId = (maxOrder?.id || 0) + 1;

    const mongoose = require('mongoose');
    const userId = new mongoose.Types.ObjectId(req.user.userId);

    const order = await Order.create({
      id: nextId,
      userId,
      customerName: payload.customerName.trim(),
      email: payload.email.trim().toLowerCase(),
      address: payload.address.trim(),
      items: payload.items,
      total: payload.total || 0,
      status: 'placed'
    });

    return res.status(201).json({
      message: 'Order placed successfully',
      order: {
        id: order.id,
        customerName: order.customerName,
        email: order.email,
        address: order.address,
        items: order.items,
        total: order.total,
        status: order.status,
        createdAt: order.createdAt
      }
    });
  } catch (error) {
    return res.status(500).json({ message: 'Failed to place order' });
  }
}

async function getMyOrders(req, res) {
  try {
    const mongoose = require('mongoose');
    const userId = new mongoose.Types.ObjectId(req.user.userId);
    const orders = await Order.find({ userId }).sort({ createdAt: -1 });
    return res.json(orders);
  } catch (error) {
    console.error('getMyOrders error:', error);
    return res.status(500).json({ message: 'Failed to fetch orders' });
  }
}

module.exports = { checkout, getMyOrders };
