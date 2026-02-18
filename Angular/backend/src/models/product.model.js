const mongoose = require('mongoose');

const productSchema = new mongoose.Schema(
  {
    id: { type: Number, required: true, unique: true },
    name: { type: String, required: true, trim: true },
    category: {
      type: String,
      required: true,
      enum: ['men', 'women', 'kid', 'new']
    },
    price: { type: Number, required: true, min: 0 },
    image: { type: String, required: true, trim: true },
    description: { type: String, required: true, trim: true }
  },
  { versionKey: false }
);

module.exports = mongoose.model('Product', productSchema);
