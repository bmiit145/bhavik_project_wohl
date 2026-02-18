# Wohl Reactions Modernization Guide (PHP → Angular + API Backend)

This project is currently a working PHP monolith. To make it more scalable, maintainable, and professionally designed, migrate in phases instead of rewriting everything at once.

## 1) First decision: AngularJS vs Angular

- **AngularJS (1.x)** is end-of-life and should not be used for a new build.
- Use **Angular (latest LTS)** for frontend.
- For backend, choose one:
  - **Node.js + NestJS/Express** (best fit with Angular ecosystem)
  - **Laravel (PHP API)** (if your team is stronger in PHP)

> Recommended target for your current request: **Angular + Node/NestJS + MySQL**.

---

## 2) Target architecture (professional production style)

### Frontend (Angular)
- Public storefront app
- Admin dashboard app (optional separate Angular project)
- UI system: Angular Material + Tailwind or Bootstrap 5
- State: NgRx or signals-based lightweight store
- API communication: typed services + interceptors (auth, error, loading)

### Backend (API server)
- REST API (`/api/v1/*`) or GraphQL
- JWT auth + refresh token flow
- Role-based access (`customer`, `admin`)
- Input validation (DTO schemas)
- Payment gateway integration layer (Razorpay wrapper service)
- Email service for OTP/order notifications

### Data layer
- MySQL (reuse current DB initially)
- ORM: Prisma or TypeORM
- Migrations + seed scripts

### Infrastructure
- Nginx reverse proxy
- Docker Compose for local development
- CI/CD: GitHub Actions (lint + test + build)

---

## 3) Migration strategy (safe and practical)

### Phase 0 — Audit current PHP app
Create an inventory of:
- Pages: home, shop, cart, checkout, profile, auth, admin
- Business logic: order placement, payment, inventory updates
- Database tables and relationships
- External integrations: Razorpay, mail

Output a migration map:
- `PHP file` → `Angular route/component`
- `PHP query` → `API endpoint + service`

### Phase 1 — Backend API extraction
Keep old PHP UI running, but build APIs for core modules first:
1. Auth (`/auth/login`, `/auth/register`, `/auth/otp-verify`)
2. Products (`/products`, `/products/:id`, filters)
3. Cart (`/cart`, add/update/remove)
4. Orders (`/orders`, `/orders/:id`, checkout)
5. Wishlist (`/wishlist`)

This gives you a stable backend before replacing UI.

### Phase 2 — Angular storefront
Build Angular app route-by-route:
1. Home
2. Product listing/details
3. Cart/wishlist
4. Checkout/payment
5. Profile/orders

Use same database through new API so existing data continues working.

### Phase 3 — Admin modernization
Move admin panel to Angular admin dashboard + secure admin APIs.

### Phase 4 — Cutover
- Switch production traffic to Angular + API.
- Keep old PHP code as rollback for short period.
- Remove legacy pages after stabilization.

---

## 4) Suggested folder structure

```text
repo/
  frontend/               # Angular storefront
  admin-frontend/         # Angular admin (optional)
  backend/                # Node/NestJS API
  docs/
  docker-compose.yml
```

Backend example:

```text
backend/src/
  modules/
    auth/
    products/
    cart/
    orders/
    users/
    payments/
  common/
    middleware/
    guards/
    interceptors/
  config/
```

---

## 5) API design examples

- `GET /api/v1/products?category=men&page=1&limit=12`
- `GET /api/v1/products/:id`
- `POST /api/v1/auth/register`
- `POST /api/v1/auth/login`
- `GET /api/v1/cart`
- `POST /api/v1/cart/items`
- `PATCH /api/v1/cart/items/:itemId`
- `DELETE /api/v1/cart/items/:itemId`
- `POST /api/v1/orders/checkout`

Use consistent response format:

```json
{
  "success": true,
  "data": {},
  "message": ""
}
```

---

## 6) Professional UI/UX checklist

- Clean typography scale (Inter/Poppins)
- 8px spacing system
- Consistent color tokens (primary, accent, neutral)
- Reusable cards, buttons, form controls
- Proper loading/skeleton states
- Empty states and helpful error messages
- Mobile-first responsive layouts
- Accessibility: keyboard focus, aria labels, contrast

---

## 7) Security checklist

- Password hashing (`bcrypt`/`argon2`)
- Short-lived access token + rotating refresh token
- Rate limiting on auth/payment endpoints
- SQL injection protection via ORM/prepared statements
- Validate all request DTOs
- Store secrets in environment variables
- CORS policy only for trusted frontend origins

---

## 8) 4-week execution plan (realistic)

### Week 1
- DB/schema audit
- Define API contracts (OpenAPI/Swagger)
- Bootstrap backend + auth module

### Week 2
- Products, cart, wishlist APIs
- Angular shell + shared UI components

### Week 3
- Checkout, orders, payment integration
- Profile/orders screens

### Week 4
- Admin essentials
- End-to-end testing + performance + production deployment

---

## 9) Practical starting commands

### Angular
```bash
npm install -g @angular/cli
ng new frontend --routing --style=scss
cd frontend
npm install @angular/material tailwindcss
```

### NestJS backend
```bash
npm i -g @nestjs/cli
nest new backend
cd backend
npm install @nestjs/config class-validator class-transformer
npm install prisma --save-dev
npm install @prisma/client
```

---

## 10) Recommended immediate next step for this repo

1. Freeze current PHP features (no new UI additions).
2. Document current DB tables and API contract draft.
3. Create `backend/` and implement auth + products APIs first.
4. Create `frontend/` and migrate Home + Shop pages first.
5. Add GitHub Actions for lint/test/build.

If you want, the next step can be implementation-oriented: I can scaffold the **actual Angular frontend + NestJS backend** structure in this repository with starter modules, auth flow, and first product APIs.
