const express = require('express');
const multer = require('multer');        // ✅ NEW
const path = require('path');            // ✅ NEW

const { listProducts, getProductById } = require('../controllers/product.controller');
const { getCart, addToCart, removeFromCart, updateCartItem, clearCart } = require('../controllers/cart.controller');
const { getWishlist, addWishlist, removeWishlist } = require('../controllers/wishlist.controller');
const { login, register } = require('../controllers/auth.controller');
const { checkout, getMyOrders } = require('../controllers/order.controller');
const {
  listAdminProducts,
  createProduct,
  updateProduct,
  deleteProduct,
  listOrders,
  updateOrderStatus
} = require('../controllers/admin.controller');

const { requireAdmin } = require('../middleware/admin-auth');
const { requireUser } = require('../middleware/user-auth');

const router = express.Router();


// ==========================
// ✅ FILE UPLOAD CONFIG
// ==========================
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, 'uploads/');
  },
  filename: (req, file, cb) => {
    cb(null, Date.now() + path.extname(file.originalname));
  }
});

const upload = multer({ storage });


// ==========================
// ROUTES
// ==========================
router.get('/health', (_, res) => res.json({ status: 'ok' }));

router.get('/products', listProducts);
router.get('/products/:id', getProductById);

router.get('/cart', requireUser, getCart);
router.post('/cart/items', requireUser, addToCart);
router.put('/cart/items/:id', requireUser, updateCartItem);
router.delete('/cart/items/:id', requireUser, removeFromCart);
router.delete('/cart', requireUser, clearCart);

router.get('/wishlist', requireUser, getWishlist);
router.post('/wishlist/items', requireUser, addWishlist);
router.delete('/wishlist/items/:id', requireUser, removeWishlist);

router.post('/auth/login', login);
router.post('/auth/register', register);

router.post('/orders/checkout', requireUser, checkout);
router.get('/orders', requireUser, getMyOrders);


// ==========================
// ✅ ADMIN ROUTES (UPDATED)
// ==========================
router.get('/admin/products', requireAdmin, listAdminProducts);

// ✅ ADD PRODUCT WITH IMAGE UPLOAD
router.post('/admin/products', requireAdmin, upload.single('image'), createProduct);

// ✅ UPDATE PRODUCT WITH IMAGE
router.put('/admin/products/:id', requireAdmin, upload.single('image'), updateProduct);

router.delete('/admin/products/:id', requireAdmin, deleteProduct);
router.get('/admin/orders', requireAdmin, listOrders);
router.put('/admin/orders/:id/status', requireAdmin, updateOrderStatus);


module.exports = router;