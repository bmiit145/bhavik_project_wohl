function checkout(req, res) {
  res.status(201).json({ message: 'Order placed successfully', order: req.body });
}

module.exports = { checkout };
