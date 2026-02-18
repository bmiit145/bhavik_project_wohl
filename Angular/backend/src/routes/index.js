const express = require('express');
const { listProducts, getProductById } = require('../controllers/product.controller');
const { getCart, addToCart, removeFromCart } = require('../controllers/cart.controller');
const { getWishlist, addWishlist } = require('../controllers/wishlist.controller');
const { login, register } = require('../controllers/auth.controller');
const { checkout } = require('../controllers/order.controller');
const {
  listAdminProducts,
  createProduct,
  updateProduct,
  deleteProduct,
  listOrders
} = require('../controllers/admin.controller');
const { requireAdmin } = require('../middleware/admin-auth');

const router = express.Router();

router.get('/health', (_, res) => res.json({ status: 'ok' }));
router.get('/products', listProducts);
router.get('/products/:id', getProductById);
router.get('/cart', getCart);
router.post('/cart/items', addToCart);
router.delete('/cart/items/:id', removeFromCart);
router.get('/wishlist', getWishlist);
router.post('/wishlist/items', addWishlist);
router.post('/auth/login', login);
router.post('/auth/register', register);
router.post('/orders/checkout', checkout);

router.get('/admin/products', requireAdmin, listAdminProducts);
router.post('/admin/products', requireAdmin, createProduct);
router.put('/admin/products/:id', requireAdmin, updateProduct);
router.delete('/admin/products/:id', requireAdmin, deleteProduct);
router.get('/admin/orders', requireAdmin, listOrders);

module.exports = router;
