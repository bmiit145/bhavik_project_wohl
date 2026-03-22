const Product = require('../models/product.model');
const Order = require('../models/order.model');


// ==========================
// GET ALL PRODUCTS
// ==========================
async function listAdminProducts(_, res) {
  try {
    const products = await Product.find({})
      .sort({ id: 1 })
      .select('-_id')
      .lean();

    return res.json(products);
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch products' });
  }
}


// ==========================
// CREATE PRODUCT (UPDATED)
// ==========================
async function createProduct(req, res) {
  try {
    const payload = req.body;

    const maxProduct = await Product.findOne({})
      .sort({ id: -1 })
      .select('id -_id')
      .lean();

    const nextId = (maxProduct?.id || 0) + 1;

    // ✅ HANDLE IMAGE UPLOAD
    const imagePath = req.file
      ? `/uploads/${req.file.filename}`
      : payload.image; // fallback (if no file)

    const product = await Product.create({
      id: nextId,
      name: payload.name,
      category: payload.category,
      price: payload.price,
      image: imagePath,
      description: payload.description,
      phone: payload.phone // ✅ NEW FIELD
    });

    return res.status(201).json({
      id: product.id,
      name: product.name,
      category: product.category,
      price: product.price,
      image: product.image,
      description: product.description,
      phone: product.phone
    });
  } catch (error) {
    console.error(error);
    return res.status(400).json({ message: 'Invalid product payload' });
  }
}


// ==========================
// UPDATE PRODUCT (UPDATED)
// ==========================
async function updateProduct(req, res) {
  try {
    const productId = Number(req.params.id);
    const payload = req.body;

    const existingProduct = await Product.findOne({ id: productId });

    if (!existingProduct) {
      return res.status(404).json({ message: 'Product not found' });
    }

    // ✅ HANDLE IMAGE UPDATE
    const imagePath = req.file
      ? `/uploads/${req.file.filename}`
      : existingProduct.image;

    const updated = await Product.findOneAndUpdate(
      { id: productId },
      {
        name: payload.name,
        category: payload.category,
        price: payload.price,
        image: imagePath,
        description: payload.description,
        phone: payload.phone // ✅ NEW FIELD
      },
      { new: true, runValidators: true }
    )
      .select('-_id')
      .lean();

    return res.json(updated);
  } catch (error) {
    console.error(error);
    return res.status(400).json({ message: 'Invalid product payload' });
  }
}


// ==========================
// DELETE PRODUCT
// ==========================
async function deleteProduct(req, res) {
  try {
    const productId = Number(req.params.id);

    const deleted = await Product.findOneAndDelete({ id: productId });

    if (!deleted) {
      return res.status(404).json({ message: 'Product not found' });
    }

    return res.status(204).send();
  } catch (error) {
    return res.status(500).json({ message: 'Failed to delete product' });
  }
}


// ==========================
// GET ORDERS
// ==========================
async function listOrders(_, res) {
  try {
    const orders = await Order.find({})
      .sort({ createdAt: -1 })
      .select('-_id -__v')
      .lean();

    return res.json(orders);
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch orders' });
  }
}


module.exports = {
  listAdminProducts,
  createProduct,
  updateProduct,
  deleteProduct,
  listOrders
};