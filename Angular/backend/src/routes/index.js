const express = require('express');
const { listProducts } = require('../controllers/product.controller');
const { getCart, addToCart, removeFromCart } = require('../controllers/cart.controller');
const { getWishlist, addWishlist } = require('../controllers/wishlist.controller');
const { login, register } = require('../controllers/auth.controller');
const { checkout } = require('../controllers/order.controller');

const router = express.Router();

router.get('/health', (_, res) => res.json({ status: 'ok' }));
router.get('/products', listProducts);
router.get('/cart', getCart);
router.post('/cart/items', addToCart);
router.delete('/cart/items/:id', removeFromCart);
router.get('/wishlist', getWishlist);
router.post('/wishlist/items', addWishlist);
router.post('/auth/login', login);
router.post('/auth/register', register);
router.post('/orders/checkout', checkout);

module.exports = router;
