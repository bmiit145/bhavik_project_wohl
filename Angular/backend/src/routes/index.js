const express = require('express');
const { listProducts, getProductById } = require('../controllers/product.controller');
const { getCart, addToCart, removeFromCart, clearCart } = require('../controllers/cart.controller');
const { getWishlist, addWishlist, removeWishlist } = require('../controllers/wishlist.controller');
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
const { requireUser } = require('../middleware/user-auth');

const router = express.Router();

router.get('/health', (_, res) => res.json({ status: 'ok' }));
router.get('/products', listProducts);
router.get('/products/:id', getProductById);
router.get('/cart', requireUser, getCart);
router.post('/cart/items', requireUser, addToCart);
router.delete('/cart/items/:id', requireUser, removeFromCart);
router.delete('/cart', requireUser, clearCart);
router.get('/wishlist', requireUser, getWishlist);
router.post('/wishlist/items', requireUser, addWishlist);
router.delete('/wishlist/items/:id', requireUser, removeWishlist);
router.post('/auth/login', login);
router.post('/auth/register', register);
router.post('/orders/checkout', checkout);

router.get('/admin/products', requireAdmin, listAdminProducts);
router.post('/admin/products', requireAdmin, createProduct);
router.put('/admin/products/:id', requireAdmin, updateProduct);
router.delete('/admin/products/:id', requireAdmin, deleteProduct);
router.get('/admin/orders', requireAdmin, listOrders);

module.exports = router;
