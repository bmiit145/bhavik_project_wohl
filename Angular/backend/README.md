# Backend API

Node/Express backend inspired by legacy PHP modules.

## Features

- Product listing (`GET /api/v1/products`)
- Seeded base products across men/women/kid/new categories
- Cart endpoints (`GET/POST/DELETE /api/v1/cart...`)
- Wishlist endpoints (`GET/POST /api/v1/wishlist...`)
- Auth stubs (`POST /api/v1/auth/login`, `POST /api/v1/auth/register`)
- Checkout (`POST /api/v1/orders/checkout`) with in-memory order recording
- Admin APIs (token-protected via `x-admin-token`):
  - `GET /api/v1/admin/products`
  - `POST /api/v1/admin/products`
  - `PUT /api/v1/admin/products/:id`
  - `DELETE /api/v1/admin/products/:id`
  - `GET /api/v1/admin/orders`

## Run

```bash
npm install
npm run start
```

Environment:
- `PORT` (default `3000`)
- `CORS_ORIGIN` (optional)
- `ADMIN_TOKEN` (default `admin-secret`)

> Current implementation is self-contained and uses in-memory data to allow immediate local API testing.
