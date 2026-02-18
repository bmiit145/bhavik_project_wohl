# Frontend (Angular)

Angular 17 standalone application that maps legacy PHP pages to SPA routes and consumes the Node API.

## Included

- Storefront routes: home, shop, category pages (men/women/kid/new), product details, cart, checkout, wishlist, profile, orders, auth pages
- Product listing from backend API
- category-specific collection pages and product details view
- Add-to-cart in client state and checkout order placement
- Admin panel routes:
  - `/admin/login`
  - `/admin` (guarded)
- Admin panel capabilities:
  - modern tabbed dashboard (overview/products/orders)
  - view/create/update/delete products
  - search/filter products by category
  - view placed orders and revenue summary

## Run

```bash
npm install
npm run start
```

Ensure backend is available at `http://localhost:3000/api/v1` (or update env files).
