const mongoose = require('mongoose');

const wishlistItemSchema = new mongoose.Schema(
  {
    productId: { type: Number, required: true, unique: true, index: true }
  },
  { timestamps: true, versionKey: false }
);

module.exports = mongoose.model('WishlistItem', wishlistItemSchema);
