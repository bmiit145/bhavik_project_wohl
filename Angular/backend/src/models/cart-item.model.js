const mongoose = require('mongoose');

const cartItemSchema = new mongoose.Schema(
  {
    userId: { type: mongoose.Schema.Types.ObjectId, required: true, index: true, ref: 'User' },
    productId: { type: Number, required: true, index: true },
    quantity: { type: Number, required: true, default: 1, min: 1 }
  },
  { timestamps: true, versionKey: false }
);

cartItemSchema.index({ userId: 1, productId: 1 }, { unique: true });

module.exports = mongoose.model('CartItem', cartItemSchema);
