const mongoose = require('mongoose');

const productSchema = new mongoose.Schema(
  {
    // Unique product ID
    id: { 
      type: Number, 
      required: true, 
      unique: true 
    },

    // Product Name
    name: { 
      type: String, 
      required: true, 
      trim: true 
    },

    // Category (fixed values)
    category: {
      type: String,
      required: true,
      enum: ['men', 'women', 'kid', 'new']
    },

    // Product Price
    price: { 
      type: Number, 
      required: true, 
      min: 0 
    },

    // Product Image (uploaded or URL)
    image: { 
      type: String, 
      trim: true 
    },

    // Product Description
    description: { 
      type: String, 
      required: true, 
      trim: true 
    },

    // ✅ NEW FIELD: Phone Number (manual entry)
    phone: {
      type: String,
      trim: true
    }
  },
  { 
    versionKey: false 
  }
);

module.exports = mongoose.model('Product', productSchema);