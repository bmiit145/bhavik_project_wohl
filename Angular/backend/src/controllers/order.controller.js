const { orders } = require('../data/mock-db');

function checkout(req, res) {
  const payload = req.body;
  const order = {
    id: orders.length + 1,
    customerName: payload.customerName,
    email: payload.email,
    address: payload.address,
    items: payload.items || [],
    total: payload.total || 0,
    status: 'placed',
    createdAt: new Date().toISOString()
  };

  orders.push(order);

  res.status(201).json({ message: 'Order placed successfully', order });
}

module.exports = { checkout };
