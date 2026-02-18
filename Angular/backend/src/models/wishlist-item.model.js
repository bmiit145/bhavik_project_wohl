const mongoose = require('mongoose');

const wishlistItemSchema = new mongoose.Schema(
  {
    userId: { type: mongoose.Schema.Types.ObjectId, required: true, index: true, ref: 'User' },
    productId: { type: Number, required: true, index: true }
  },
  { timestamps: true, versionKey: false }
);

wishlistItemSchema.index({ userId: 1, productId: 1 }, { unique: true });

module.exports = mongoose.model('WishlistItem', wishlistItemSchema);
