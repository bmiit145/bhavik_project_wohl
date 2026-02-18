# Angular Migration Workspace

This workspace now contains a working PHP-to-Angular/Node conversion starter inspired by the original features:

- `frontend/` → Angular storefront with mapped routes, cart flow, checkout, and admin panel UI.
- `backend/` → Node/Express API for products, cart, wishlist, auth, checkout, and admin product/order management.

## Run

1. Start backend:
   ```bash
   cd backend
   npm install
   npm run start
   ```
2. Start frontend:
   ```bash
   cd ../frontend
   npm install
   npm run start
   ```
3. Open `http://localhost:4200`.

## Demo Admin Access

- Admin login URL: `http://localhost:4200/admin/login`
- UI credentials: `admin / admin123`
- Backend admin header token: `x-admin-token: admin-secret`
