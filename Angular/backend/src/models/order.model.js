const mongoose = require('mongoose');

const orderItemSchema = new mongoose.Schema(
  {
    id: { type: Number, required: true },
    name: { type: String, required: true, trim: true },
    price: { type: Number, required: true, min: 0 }
  },
  { _id: false }
);

const orderSchema = new mongoose.Schema(
  {
    id: { type: Number, required: true, unique: true, index: true },
    customerName: { type: String, required: true, trim: true },
    email: { type: String, required: true, trim: true, lowercase: true },
    address: { type: String, required: true, trim: true },
    items: { type: [orderItemSchema], default: [] },
    total: { type: Number, required: true, min: 0 },
    status: { type: String, required: true, default: 'placed' },
    createdAt: { type: Date, default: Date.now }
  },
  { versionKey: false }
);

module.exports = mongoose.model('Order', orderSchema);
