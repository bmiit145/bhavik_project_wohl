const mongoose = require('mongoose');

const cartItemSchema = new mongoose.Schema(
  {
    userId: { type: mongoose.Schema.Types.ObjectId, required: true, index: true, ref: 'User' },
    productId: { type: Number, required: true, index: true }
  },
  { timestamps: true, versionKey: false }
);

cartItemSchema.index({ userId: 1, productId: 1 });

module.exports = mongoose.model('CartItem', cartItemSchema);
