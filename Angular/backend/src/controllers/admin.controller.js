const Product = require('../models/product.model');
const { orders } = require('../data/mock-db');

async function listAdminProducts(_, res) {
  try {
    const products = await Product.find({}).sort({ id: 1 }).select('-_id').lean();
    return res.json(products);
  } catch (error) {
    return res.status(500).json({ message: 'Failed to fetch products' });
  }
}

async function createProduct(req, res) {
  try {
    const payload = req.body;
    const maxProduct = await Product.findOne({}).sort({ id: -1 }).select('id -_id').lean();
    const nextId = (maxProduct?.id || 0) + 1;

    const product = await Product.create({
      id: nextId,
      name: payload.name,
      category: payload.category,
      price: payload.price,
      image: payload.image,
      description: payload.description
    });

    return res.status(201).json({
      id: product.id,
      name: product.name,
      category: product.category,
      price: product.price,
      image: product.image,
      description: product.description
    });
  } catch (error) {
    return res.status(400).json({ message: 'Invalid product payload' });
  }
}

async function updateProduct(req, res) {
  try {
    const productId = Number(req.params.id);
    const payload = req.body;

    const updated = await Product.findOneAndUpdate(
      { id: productId },
      {
        name: payload.name,
        category: payload.category,
        price: payload.price,
        image: payload.image,
        description: payload.description
      },
      { new: true, runValidators: true }
    )
      .select('-_id')
      .lean();

    if (!updated) {
      return res.status(404).json({ message: 'Product not found' });
    }

    return res.json(updated);
  } catch (error) {
    return res.status(400).json({ message: 'Invalid product payload' });
  }
}

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

function listOrders(_, res) {
  return res.json(orders);
}

module.exports = {
  listAdminProducts,
  createProduct,
  updateProduct,
  deleteProduct,
  listOrders
};
