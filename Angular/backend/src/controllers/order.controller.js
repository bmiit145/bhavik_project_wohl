const Order = require('../models/order.model');

async function checkout(req, res) {
  try {
    const payload = req.body;
    const maxOrder = await Order.findOne({}).sort({ id: -1 }).select('id -_id').lean();
    const nextId = (maxOrder?.id || 0) + 1;

    const order = await Order.create({
      id: nextId,
      customerName: payload.customerName,
      email: payload.email,
      address: payload.address,
      items: payload.items || [],
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

module.exports = { checkout };
