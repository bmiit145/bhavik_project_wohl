# Frontend (Angular)

Angular 17 standalone application that maps legacy PHP pages to SPA routes and consumes the Node API.

## Included

- Storefront routes: home, shop, men/women/kid/new, cart, checkout, wishlist, profile, orders, auth pages
- Product listing from backend API
- Add-to-cart in client state and checkout order placement
- Admin panel routes:
  - `/admin/login`
  - `/admin` (guarded)
- Admin panel capabilities:
  - view/create/delete products
  - view placed orders

## Run

```bash
npm install
npm run start
```

Ensure backend is available at `http://localhost:3000/api/v1` (or update env files).
