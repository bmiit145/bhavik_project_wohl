const mongoose = require('mongoose');

const cartItemSchema = new mongoose.Schema(
  {
    productId: { type: Number, required: true, index: true }
  },
  { timestamps: true, versionKey: false }
);

module.exports = mongoose.model('CartItem', cartItemSchema);
