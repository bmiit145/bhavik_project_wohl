# PROJECT REPORT

# WOHL REACTIONS COSMETIC STORE

---

**SUBMITTED BY:**

- 6809-(124) - NAVADIYA VISHWA RAJESHBHAI
- 6941-(134) - SUTARIYA BHAVIK BHARATBHAI
- 6761-(156) - KIKANI NITANSHU MAHESHBHAI

**GUIDED BY:** MS. SANSKRUTI RAMANI

**SUBMITTED TO:** Sutex Bank College of Computer Applications & Science, Amroli

**Affiliated to:** Veer Narmad South Gujarat University, Surat

---

## TABLE OF CONTENTS

| Chapter | Title | Page |
|---------|-------|------|
| 1 | Introduction | 1 |
| 1.1 | Project Description | 1 |
| 1.2 | Project Profile | 2 |
| 2 | Environment Description | 3 |
| 2.1 | Hardware & Software Requirements | 3 |
| 2.2 | Technologies Used | 4 |
| 3 | System Analysis & Planning | 8 |
| 3.1 | Existing System & Drawbacks | 8 |
| 3.2 | Requirement Gathering & Analysis | 9 |
| 4 | Proposed System | 10 |
| 4.1 | Scope | 10 |
| 4.2 | Project Modules | 10 |
| 4.3 | Module-wise Objectives | 12 |
| 4.4 | Expected Advantages | 14 |
| 5 | System Architecture | 15 |
| 5.1 | Three-Tier Architecture | 15 |
| 5.2 | System Flow | 16 |
| 5.3 | Data Flow Diagrams | 17 |
| 5.4 | Entity-Relationship Diagram | 17 |
| 6 | System Design | 18 |
| 6.1 | Database Design | 18 |
| 6.2 | Directory Structure | 21 |
| 6.3 | API Endpoints | 24 |
| 6.4 | Frontend Components | 27 |
| 6.5 | Frontend Services | 32 |
| 6.6 | Backend Controllers | 37 |
| 6.7 | Backend Middleware | 42 |
| 7 | System Testing | 43 |
| 8 | Limitations & Future Scope | 46 |
| 9 | References | 47 |

---

## CHAPTER 1: INTRODUCTION

### 1.1 Project Description

**WOHL REACTIONS COSMETIC STORE** is a professionally developed full-stack e-commerce web application focused on selling various types of cosmetic and skincare products including:

- Makeup & Beauty Products
- Fragrances & Perfumes
- Hair Care Products
- Skin Care & Grooming Essentials

The platform provides a complete online shopping experience similar to real-life retail stores. It is designed with a modern, professional, and user-friendly interface using Angular 19 as the frontend framework and Node.js with Express as the backend API server.

**Key Highlights:**

- Fully responsive design for seamless usability across desktops, tablets, and smartphones
- Modern Single Page Application (SPA) architecture for fast navigation
- Real-time reactive state management using Angular Signals
- Secure JWT-based authentication for customers
- Token-based authentication for admin operations
- Product image upload support with preview
- Full admin panel for product and order management
- Shopping cart with quantity management
- Wishlist functionality for saving favourite products
- Order placement with status tracking

The platform includes two distinct panels:

1. **User Panel** — For customers to browse, shop, and manage orders
2. **Admin Panel** — For administrators to manage products, view orders, and update order statuses

---

### 1.2 Project Profile

| Field | Details |
|-------|---------|
| **Project Title** | Wohl Reactions Cosmetic Store |
| **Frontend Framework** | Angular 19 (Standalone Components) |
| **UI Library** | Angular Material 19 + Bootstrap 5 |
| **Backend Runtime** | Node.js 18+ |
| **Backend Framework** | Express.js 4.19 |
| **Database** | MongoDB (via Mongoose 8.5 ODM) |
| **Authentication** | JWT (jsonwebtoken) + bcryptjs |
| **File Upload** | Multer 2.1 |
| **IDE/Editor** | Visual Studio Code |
| **Version Control** | Git + GitHub |
| **Browser** | Google Chrome, Microsoft Edge |
| **Operating System** | Windows 11 / macOS |
| **Documentation** | MS Word |
| **Internal Guide** | Ms. Sanskruti Ramani |

---

## CHAPTER 2: ENVIRONMENT DESCRIPTION

### 2.1 Hardware & Software Requirements

#### Hardware Requirements

| Component | Minimum Specification |
|-----------|----------------------|
| Processor | Intel Pentium Dual Core or above |
| RAM | 4 GB minimum (8 GB recommended) |
| Storage | 500 MB free disk space |
| Display | 1024 x 768 resolution or higher |
| Network | Internet connection for MongoDB Atlas |

#### Software Requirements

| Software | Version / Details |
|----------|------------------|
| Operating System | Windows 10/11 or macOS |
| Node.js | v18.0 or above |
| npm | v9.0 or above |
| Angular CLI | v19.2+ |
| MongoDB | Atlas Cloud or Local v7.0+ |
| Browser | Google Chrome 120+, Edge 120+ |
| Code Editor | Visual Studio Code |
| API Testing | Postman (optional) |

---

### 2.2 Technologies Used

#### A. Frontend Technologies

**1. HTML5 (HyperText Markup Language)**

HTML5 is the standard markup language used to create the structure of all web pages in the Wohl Reactions application. Every component template (`.component.html`) uses HTML to define headings, images, forms, navigation menus, product cards, and interactive elements.

In Wohl Reactions, HTML is used to:
- Structure pages: Home, Shop, Cart, Checkout, Login, Register, Admin Dashboard
- Create product display cards with images and details
- Design forms for user registration, login, checkout, and product management
- Build responsive navigation bar with mobile drawer

**2. CSS3 / SCSS (Cascading Style Sheets)**

SCSS (Sassy CSS) is used extensively to style the application. Each component has its own scoped stylesheet (`.component.scss`) ensuring modular, maintainable styling with no global conflicts.

In Wohl Reactions, SCSS is used for:
- Component-scoped styling with Angular's ViewEncapsulation
- Responsive design with media queries for mobile, tablet, and desktop
- CSS animations (hero blob float, modal slide-in, dropdown fade-in)
- Gradient backgrounds, glassmorphism effects, and hover transitions
- Dark gradient CTA banners with radial glow effects

**3. TypeScript**

TypeScript is the primary programming language for the Angular frontend. It provides static typing, interfaces, decorators, and modern ES6+ features for robust, maintainable code.

In Wohl Reactions, TypeScript is used for:
- Defining component classes with decorators (`@Component`, `@Input`, `@HostListener`)
- Creating typed interfaces for data models (`Product`, `Order`, `AuthUser`)
- Implementing services with dependency injection
- Using Angular Signals for reactive state management
- Type-safe HTTP client operations with generics

**4. Angular 19 Framework**

Angular is a powerful frontend framework developed by Google for building dynamic Single Page Applications (SPA). Wohl Reactions uses Angular 19 with the modern **standalone component** architecture (no NgModules required).

Key Angular Features Used:
- **Standalone Components**: Each component is self-contained with its own imports
- **Angular Signals**: Reactive primitives for cart, wishlist, and auth state
- **Router**: Client-side routing with lazy loading, route guards, and parameterized routes
- **HttpClient**: HTTP communication with interceptors for API prefix and auth tokens
- **FormsModule**: Two-way data binding with `ngModel` for forms
- **Reactive State**: `signal()`, `computed()`, `effect()` for real-time UI updates

Advantages of Angular in Wohl Reactions:
- Fast and smooth SPA experience without full page reloads
- Structured and organized development with component architecture
- Reusable components (e.g., `ProductCardComponent` used across Shop, Home, Categories)
- Real-time cart/wishlist updates without page refresh
- Strong TypeScript support for scalable applications

**5. Angular Material 19**

Angular Material is the official Material Design component library for Angular. It provides pre-built, accessible, and customizable UI components.

Components Used:
- `MatToolbar` — Sticky navigation bar
- `MatIcon` — Material icons for cart, wishlist, search, admin
- `MatMenu` — User dropdown menu with profile/logout
- `MatButton` — Styled action buttons
- `MatBadge` — Cart item count badge
- `MatDivider` — Visual separators in menus
- `MatFormField` & `MatInput` — Search bar input

**6. Bootstrap 5**

Bootstrap 5 CSS framework is used alongside Angular Material for layout utilities and the admin panel styling.

Usage in Wohl Reactions:
- Grid system (`row`, `col-md-6`, `col-lg-3`) for responsive layouts
- Card components for admin dashboard
- Table styling for product and order lists
- Form controls (`form-control`, `form-select`) in admin forms
- Badge components for category labels and status indicators
- Button groups for pagination

**7. SweetAlert2**

SweetAlert2 is used for beautiful, customizable alert dialogs throughout the application.

Usage:
- Success notifications when products are added to cart/wishlist
- Confirmation dialogs for delete operations
- Toast notifications for order status updates
- Error alerts for failed operations
- Login prompts when unauthenticated users try to access protected features

---

#### B. Backend Technologies

**1. Node.js**

Node.js is a server-side JavaScript runtime environment built on Chrome's V8 engine. It enables running JavaScript on the server, making it possible to use a single language (JavaScript/TypeScript) across the entire stack.

In Wohl Reactions, Node.js is used for:
- Running the Express.js backend server on port 3000
- Managing client-server communication via REST APIs
- Handling multiple concurrent user requests efficiently
- Connecting the Angular frontend with MongoDB database
- Processing file uploads for product images

**2. Express.js 4.19**

Express.js is a minimal, flexible web application framework for Node.js that simplifies building RESTful APIs.

In Wohl Reactions, Express.js is used to:
- Create 22+ RESTful API endpoints
- Manage routing for products, cart, wishlist, orders, auth, and admin operations
- Handle HTTP requests (GET, POST, PUT, DELETE) and responses
- Implement middleware pipeline: Helmet → CORS → JSON Parser → Morgan → Routes
- Serve static files from the `/uploads` directory for product images
- Apply authentication middleware (`requireUser`, `requireAdmin`) to protected routes

**3. Multer 2.1**

Multer is a Node.js middleware for handling `multipart/form-data`, used for product image uploads.

Configuration:
- Storage: Disk storage in `/uploads/` directory
- Filename: Timestamp-based to avoid conflicts (e.g., `1711234567890.jpg`)
- Used in: `POST /admin/products` and `PUT /admin/products/:id` routes

---

#### C. Database

**MongoDB with Mongoose 8.5**

MongoDB is a NoSQL document database that stores data in flexible, JSON-like BSON documents. Mongoose is the ODM (Object Data Modeling) library that provides schema validation and query building.

In Wohl Reactions, MongoDB stores:
- **Users Collection**: Customer accounts with hashed passwords
- **Products Collection**: Product catalog with images, prices, categories
- **CartItems Collection**: User-product associations with quantities
- **WishlistItems Collection**: User-product favourites
- **Orders Collection**: Complete order records with items and status

Advantages:
- Flexible schema design — easy to evolve data models
- High performance with indexing (compound unique indexes on cart/wishlist)
- Scalable with MongoDB Atlas cloud hosting
- Native JSON format — seamless integration with Node.js/Express
- Rich query capabilities with Mongoose aggregation support

---

#### D. Security & Authentication Libraries

| Library | Version | Purpose |
|---------|---------|---------|
| jsonwebtoken | 9.0.2 | JWT token generation and verification |
| bcryptjs | 2.4.3 | Password hashing (10 rounds) |
| helmet | 7.1.0 | HTTP security headers |
| cors | 2.8.5 | Cross-Origin Resource Sharing |
| morgan | 1.10.0 | HTTP request logging |

---

## CHAPTER 3: SYSTEM ANALYSIS & PLANNING

### 3.1 Existing System & Drawbacks

Currently, many cosmetic retail operations function through physical stores or basic websites that lack dynamic functionality.

**Problems with Existing Systems:**

1. **Physical Store Limitations**: Customers must travel to the location during operating hours, limiting the customer base geographically
2. **Non-Responsive Websites**: Older digital solutions use technologies that are not mobile-responsive, resulting in poor user experience on smartphones
3. **Manual Record Keeping**: Legacy systems rely on manual processes for orders, inventory, and sales, leading to data inconsistencies
4. **Security Vulnerabilities**: User passwords stored in plain text, making the system vulnerable to data breaches
5. **No Real-time Updates**: Traditional multi-page applications require full page reloads, creating a slow and disjointed user experience
6. **Limited Admin Tools**: Basic admin interfaces without image upload, order status management, or dashboard analytics

**Drawbacks of Legacy Approaches:**
- No single-page application architecture — slow navigation
- Server-side rendering for every page — poor performance
- No reactive state management — cart/wishlist not synced in real-time
- No JWT-based authentication — session-based auth is less scalable
- No image upload capability — products linked via external URLs only

---

### 3.2 Requirement Gathering & Analysis

#### Requirement Gathering

- Collected requirements through discussions with the project guide and team to define core user and admin needs
- Studied existing cosmetic e-commerce websites (Nykaa, Sephora, Myntra) to understand common features and user expectations
- Identified essential modules: User Authentication, Product Catalog, Shopping Cart, Wishlist, Order Management, Admin Dashboard
- Listed technical requirements based on the MEAN stack: Angular frontend, Node.js/Express backend, MongoDB database
- Defined API contract between frontend and backend with 22+ REST endpoints

#### Requirement Analysis

**Functional Requirements:**
- Users must be able to register, login, and maintain sessions across page refreshes
- Product browsing with category filtering (Men, Women, Kid, New Arrivals)
- Shopping cart with add, remove, quantity update, and clear operations
- Wishlist for saving favourite products
- Checkout flow with customer details and order placement
- Order history viewing for customers
- Admin product CRUD with image upload
- Admin order management with status updates

**Non-Functional Requirements:**
- Response time under 500ms for API calls
- Secure password storage with bcrypt hashing
- JWT tokens with 7-day expiration
- Mobile-responsive design (breakpoints: 480px, 860px, 960px)
- SweetAlert2 notifications for user feedback
- Paginated lists in admin panel (5 items per page)

---

## CHAPTER 4: PROPOSED SYSTEM

### 4.1 Scope

Wohl Reactions is a cosmetic e-commerce platform that provides:
- **User-Friendly Shopping Experience** — Browse products by category with an intuitive interface
- **Secure Authentication** — JWT-based authentication with bcrypt password hashing
- **Admin Panel** — Full product CRUD, order management, and dashboard analytics
- **Cart & Wishlist** — Real-time sync using Angular Signals
- **Order Management** — Complete order lifecycle (placed → confirmed → shipped → delivered)
- **Product Image Upload** — Admin can upload product images with drag-and-drop preview

---

### 4.2 Project Modules

The system consists of two main panels:

#### User Panel Features

**1. User Registration & Login**
- New users register with full name, email, and password
- Password validation (minimum 6 characters)
- Existing users login with email/password
- JWT token stored in localStorage for session persistence
- Automatic cart and wishlist sync after login

**2. Product Browsing**
- View all products on the Shop page
- Filter by category: Men, Women, Kid, New Arrivals
- Search products by name
- View detailed product information with image, description, and price

**3. Shopping Cart**
- Add products to cart (requires login)
- View cart items with quantities and prices
- Update item quantities
- Remove individual items
- View total price (auto-calculated)
- Proceed to checkout

**4. Wishlist**
- Save favourite products for later
- Remove items from wishlist
- Duplicate prevention (unique index on userId + productId)

**5. Checkout & Orders**
- Enter shipping details (name, email, address)
- Place order with cart items
- View order confirmation with order ID
- View order history with status tracking
- Order statuses: Placed, Confirmed, Shipped, Delivered, Cancelled

**6. User Profile**
- View account information
- View past orders

---

#### Admin Panel Features

**1. Admin Login**
- Secure login with username/password
- Session stored in localStorage
- Route guard protection on admin dashboard

**2. Dashboard Overview**
- Total products count
- Total orders count
- Quick navigation between tabs

**3. Product Management**
- **Create Product**: Form with name, category, price, description, and image upload
- **View Products**: Paginated table (5 per page) with image thumbnails
- **Edit Product**: Modal dialog to update all product fields including image
- **Delete Product**: Confirmation dialog before deletion

**4. Order Management**
- View all customer orders with details
- Update order status via dropdown (Placed → Confirmed → Shipped → Delivered → Cancelled)
- Paginated order list (5 per page)
- Visual status indicators with colour-coded badges

---

### 4.3 Module-wise Objectives

#### User Module

**Registration Flow:**
```
User fills form (fullName, email, password)
    ↓
Frontend validates (required fields, password ≥ 6 chars)
    ↓
POST /api/v1/auth/register
    ↓
Backend: Check duplicate email → Hash password (bcrypt 10 rounds) → Create user
    ↓
Return user object → Redirect to login page
```

**Login Flow:**
```
User enters email + password
    ↓
POST /api/v1/auth/login
    ↓
Backend: Find user by email → Compare password with bcrypt → Generate JWT (7 days)
    ↓
Return { accessToken, user } → Store in localStorage → Update AuthService signal
    ↓
Navbar updates reactively → Cart & Wishlist sync from server
```

**Navbar Behaviour:**
- Logged out: Shows Sign In, Register, Admin Login buttons
- Logged in: Shows Cart icon, Wishlist icon, User avatar with dropdown (Profile, Admin Panel, Logout)
- Mobile: Hamburger menu with drawer navigation

---

#### Product / Collection Module

**Product Listing Flow:**
```
User visits /shop or /men or /women or /kid or /new
    ↓
Component calls ProductService.getProducts(category?)
    ↓
GET /api/v1/products?category=<cat>
    ↓
Backend: Query MongoDB with optional category filter → Return sorted products
    ↓
Display products in responsive grid using ProductCardComponent
```

**Each product card displays:**
- Product image (190px height, rounded corners)
- Product name (linked to detail page)
- Product description
- Price in INR (₹) format
- "Add to Cart" button
- "Wishlist" button
- "View Details" link

---

#### Cart Module

**Add to Cart Flow:**
```
User clicks "Add to Cart"
    ↓
CartService checks authentication (AuthService.getToken())
    ├── Not logged in → SweetAlert prompt to login
    └── Logged in → Continue
    ↓
POST /api/v1/cart/items { productId }
    ↓
Backend: Upsert CartItem (increment quantity if exists, create if new)
    ↓
CartService.sync() → Fetch updated cart → Update Signal
    ↓
UI updates reactively (cart badge count, cart page)
```

**Cart Page Features:**
- List of cart items with product image, name, price, quantity
- Quantity update controls
- Remove button per item
- Grand total (computed: sum of price × quantity)
- "Proceed to Checkout" button

---

#### Checkout & Orders Module

**Checkout Flow:**
```
User navigates to /checkout
    ↓
CheckoutComponent displays cart items + total + form
    ↓
User fills: customerName, email, address
    ↓
Form validation → Submit
    ↓
POST /api/v1/orders/checkout {
    customerName, email, address,
    items: [{ id, name, price, quantity }],
    total
}
    ↓
Backend: Validate fields → Generate order ID → Create Order document
    ↓
Frontend: Show success message with Order ID → Clear cart → Redirect to /orders
```

---

#### Admin Module

**Product CRUD Operations:**
```
Create:  POST   /api/v1/admin/products     (FormData with image file)
Read:    GET    /api/v1/admin/products     (all products sorted by ID)
Update:  PUT    /api/v1/admin/products/:id (FormData with optional new image)
Delete:  DELETE /api/v1/admin/products/:id (with SweetAlert confirmation)
```

**Order Management:**
```
List:    GET /api/v1/admin/orders              (all orders, newest first)
Update:  PUT /api/v1/admin/orders/:id/status   { status: "confirmed" }
```

---

### 4.4 Expected Advantages

| Advantage | Description |
|-----------|-------------|
| **High Security** | JWT authentication, bcrypt password hashing, Helmet security headers |
| **Fast Performance** | SPA architecture — no full page reloads, Angular Signals for reactive UI |
| **Responsive Design** | Works on desktop, tablet, and mobile with 3 breakpoints |
| **Real-time Updates** | Cart/wishlist sync via Signals — no manual refresh needed |
| **Scalable Architecture** | Three-tier separation (frontend, API, database) |
| **Modern UX** | Glassmorphism navbar, animated hero, SweetAlert dialogs, Material components |
| **Easy Maintenance** | Standalone components, modular services, clean separation of concerns |
| **Image Upload** | Admin can upload product images with preview and drag-drop interface |

---

## CHAPTER 5: SYSTEM ARCHITECTURE

### 5.1 Three-Tier Architecture

The Wohl Reactions application follows a **three-tier architecture**:

```
┌─────────────────────────────────────────────────────┐
│              PRESENTATION LAYER                      │
│         (Angular 19 Frontend — Browser)              │
│                                                      │
│  Components: Home, Shop, Cart, Checkout, Admin       │
│  Services: Auth, Product, Cart, Wishlist, Order      │
│  State: Angular Signals (reactive primitives)        │
│  UI: Angular Material + Bootstrap 5 + SCSS           │
│                                                      │
│         Runs on: http://localhost:4200                │
└──────────────────────┬──────────────────────────────┘
                       │ HTTP REST API Calls
                       │ (JSON + FormData)
                       ▼
┌─────────────────────────────────────────────────────┐
│              APPLICATION LAYER                       │
│       (Node.js + Express REST API Server)            │
│                                                      │
│  Routes: 22+ REST endpoints                         │
│  Controllers: Auth, Product, Cart, Wishlist,         │
│               Order, Admin                           │
│  Middleware: JWT Auth, Admin Token Auth,              │
│              Helmet, CORS, Morgan                    │
│  File Upload: Multer (disk storage)                  │
│                                                      │
│         Runs on: http://localhost:3000                │
└──────────────────────┬──────────────────────────────┘
                       │ Mongoose ODM Queries
                       │ (CRUD Operations)
                       ▼
┌─────────────────────────────────────────────────────┐
│                  DATA LAYER                          │
│          (MongoDB with Mongoose ODM)                 │
│                                                      │
│  Collections: Users, Products, CartItems,            │
│               WishlistItems, Orders                  │
│  Indexes: Unique compound (userId + productId)       │
│  Hosting: MongoDB Atlas (Cloud)                      │
│                                                      │
└─────────────────────────────────────────────────────┘
```

---

### 5.2 System Flow

**Overall System Flow:**

1. User accesses Wohl Reactions via web browser at `http://localhost:4200`
2. Angular renders the SPA — no server-side rendering needed
3. User interactions trigger API calls via Angular HttpClient
4. API Prefix Interceptor prepends `http://localhost:3000/api/v1` to all requests
5. Auth Token Interceptor attaches JWT Bearer token to authenticated requests
6. Express server receives request → applies middleware → routes to controller
7. Controller validates input → performs Mongoose queries on MongoDB
8. MongoDB returns data → Controller formats response → Express sends JSON
9. Angular receives response → updates Signals → UI re-renders reactively

---

### 5.3 Data Flow Diagrams

**Level-0 DFD (Context Diagram):**

```
                    Register/Login/Browse/AddToCart/PlaceOrder
    ┌──────────┐  ──────────────────────────────────────────>  ┌──────────────┐
    │ Customer │                                                │   Wohl       │
    │          │  <──────────────────────────────────────────   │   Reactions   │
    └──────────┘    Products/Cart/Orders/Confirmations          │   System     │
                                                                │              │
    ┌──────────┐   Login/AddProduct/UpdateOrder                │              │
    │  Admin   │  ──────────────────────────────────────────>  │              │
    │          │  <──────────────────────────────────────────   └──────────────┘
    └──────────┘    Products/Orders/Status
```

**Level-1 DFD (Admin):**

```
Admin → [1.0 Login] → Users DB
Admin → [2.0 Product Management] → Products DB
         ├── 2.1 Add Product (with image)
         ├── 2.2 View Products
         ├── 2.3 Update Product
         └── 2.4 Delete Product
Admin → [3.0 Order Management] → Orders DB
         ├── 3.1 View All Orders
         └── 3.2 Update Order Status
```

**Level-1 DFD (User):**

```
User → [1.0 Login/Register] → Users DB
User → [2.0 Browse Products] ← Products DB
User → [3.0 Add to Cart] → CartItems DB
User → [4.0 Add to Wishlist] → WishlistItems DB
User → [5.0 Place Order] → Orders DB
User → [6.0 View Orders] ← Orders DB
```

---

### 5.4 Entity-Relationship Diagram

```
┌──────────┐         ┌──────────────┐         ┌───────────┐
│  Admin   │ 1───M   │   Product    │  1───M  │ CartItem  │
│──────────│ manages  │──────────────│         │───────────│
│ email    │         │ id (unique)   │         │ userId    │
│ password │         │ name          │         │ productId │
└──────────┘         │ category      │         │ quantity  │
                     │ price         │         └───────────┘
                     │ image         │               │
                     │ description   │               │
                     └──────────────┘         belongs to
                           │                        │
                      referenced by            ┌───────────┐
                           │                   │   User    │
                     ┌──────────────┐          │───────────│
                     │ WishlistItem │          │ fullName  │
                     │──────────────│  M───1   │ email     │
                     │ userId       │──────────│ password  │
                     │ productId    │          │ role      │
                     └──────────────┘          └───────────┘
                                                    │
                                               1───M│
                                                    │
                                              ┌───────────┐
                                              │   Order   │
                                              │───────────│
                                              │ id        │
                                              │ userId    │
                                              │ items[]   │
                                              │ total     │
                                              │ status    │
                                              │ createdAt │
                                              └───────────┘
```

**Relationships:**
- A **User** can have many **CartItems** (1:M)
- A **User** can have many **WishlistItems** (1:M)
- A **User** can place many **Orders** (1:M)
- Each **CartItem** references one **Product** (M:1)
- Each **WishlistItem** references one **Product** (M:1)
- Each **Order** contains embedded **OrderItems** (sub-documents)
- **Admin** manages **Products** (1:M)

---

## CHAPTER 6: SYSTEM DESIGN

### 6.1 Database Design

#### 1. Users Collection

| No. | Field | Datatype | Constraint |
|-----|-------|----------|------------|
| 1 | _id | ObjectId | Primary Key (auto) |
| 2 | fullName | String | Required, Trimmed |
| 3 | email | String | Required, Unique, Lowercase |
| 4 | passwordHash | String | Required (bcrypt hash) |
| 5 | role | String | Enum: 'customer' / 'admin', Default: 'customer' |
| 6 | createdAt | Date | Auto-generated |
| 7 | updatedAt | Date | Auto-generated |

#### 2. Products Collection

| No. | Field | Datatype | Constraint |
|-----|-------|----------|------------|
| 1 | _id | ObjectId | Primary Key (auto) |
| 2 | id | Number | Required, Unique, Indexed |
| 3 | name | String | Required, Trimmed |
| 4 | category | String | Required, Enum: 'men' / 'women' / 'kid' / 'new' |
| 5 | price | Number | Required, Min: 0 |
| 6 | image | String | File path or URL |
| 7 | description | String | Required, Trimmed |
| 8 | phone | String | Optional |

#### 3. CartItems Collection

| No. | Field | Datatype | Constraint |
|-----|-------|----------|------------|
| 1 | _id | ObjectId | Primary Key (auto) |
| 2 | userId | ObjectId | Foreign Key → Users, Indexed |
| 3 | productId | Number | Foreign Key → Products, Indexed |
| 4 | quantity | Number | Default: 1, Min: 1 |
| 5 | createdAt | Date | Auto-generated |
| 6 | updatedAt | Date | Auto-generated |

**Index:** Compound Unique Index on `(userId, productId)` — prevents duplicate cart entries.

#### 4. WishlistItems Collection

| No. | Field | Datatype | Constraint |
|-----|-------|----------|------------|
| 1 | _id | ObjectId | Primary Key (auto) |
| 2 | userId | ObjectId | Foreign Key → Users, Indexed |
| 3 | productId | Number | Foreign Key → Products, Indexed |
| 4 | createdAt | Date | Auto-generated |
| 5 | updatedAt | Date | Auto-generated |

**Index:** Compound Unique Index on `(userId, productId)` — prevents duplicate wishlist entries.

#### 5. Orders Collection

| No. | Field | Datatype | Constraint |
|-----|-------|----------|------------|
| 1 | _id | ObjectId | Primary Key (auto) |
| 2 | id | Number | Required, Unique, Indexed (auto-increment) |
| 3 | userId | ObjectId | Foreign Key → Users |
| 4 | customerName | String | Required, Trimmed |
| 5 | email | String | Required, Lowercase, Trimmed |
| 6 | address | String | Required, Trimmed |
| 7 | items | Array | Embedded OrderItem sub-documents |
| 8 | total | Number | Required, Min: 0 |
| 9 | status | String | Default: 'placed' |
| 10 | createdAt | Date | Default: Date.now |

**OrderItem Sub-document:**

| Field | Datatype | Description |
|-------|----------|-------------|
| id | Number | Product ID |
| name | String | Product name (snapshot) |
| price | Number | Product price (snapshot) |
| quantity | Number | Quantity ordered |

---

### 6.2 Directory Structure

#### Frontend Structure

```
Angular/frontend/
├── src/
│   ├── app/
│   │   ├── app.component.ts          # Root component (navbar + footer)
│   │   ├── app.component.html        # Navigation bar, search, mobile drawer
│   │   ├── app.component.scss        # Glassmorphism navbar, drawer styles
│   │   ├── app.routes.ts             # All 20+ route definitions
│   │   ├── app.config.ts             # App providers configuration
│   │   │
│   │   ├── core/
│   │   │   ├── models/
│   │   │   │   ├── product.model.ts  # Product interface
│   │   │   │   └── order.model.ts    # Order interface
│   │   │   │
│   │   │   └── services/
│   │   │       ├── auth.service.ts           # JWT auth + Signals
│   │   │       ├── product.service.ts        # Product API calls
│   │   │       ├── cart.service.ts            # Cart state + API
│   │   │       ├── wishlist.service.ts        # Wishlist state + API
│   │   │       ├── order.service.ts           # Order API calls
│   │   │       ├── admin.service.ts           # Admin API calls
│   │   │       ├── admin-session.service.ts   # Admin local auth
│   │   │       ├── admin-auth.guard.ts        # Admin route guard
│   │   │       ├── api-prefix.interceptor.ts  # API URL prefix
│   │   │       └── auth-token.interceptor.ts  # JWT header injection
│   │   │
│   │   ├── pages/
│   │   │   ├── home/                 # Landing page (hero + categories + featured)
│   │   │   ├── shop/                 # Product listing with search
│   │   │   ├── product-details/      # Single product view
│   │   │   ├── cart/                 # Shopping cart
│   │   │   ├── checkout/            # Order placement form
│   │   │   ├── orders/              # Order history
│   │   │   ├── wishlist/            # Saved products
│   │   │   ├── login/               # Customer login
│   │   │   ├── register/            # Customer registration
│   │   │   ├── profile/             # User profile
│   │   │   ├── men/                 # Men's products category
│   │   │   ├── women/               # Women's products category
│   │   │   ├── kid/                 # Kid's products category
│   │   │   ├── new-arrivals/        # New products category
│   │   │   ├── contact/             # Contact page
│   │   │   ├── about/               # About page
│   │   │   ├── admin-login/         # Admin authentication
│   │   │   ├── admin-dashboard/     # Admin panel (products + orders)
│   │   │   ├── forgot-password/     # Password recovery
│   │   │   └── not-found/           # 404 page
│   │   │
│   │   └── shared/
│   │       └── product-card/        # Reusable product card component
│   │
│   ├── environments/
│   │   └── environment.ts           # API base URL config
│   ├── main.ts                      # Bootstrap with providers
│   ├── index.html                   # Root HTML with Material theme
│   └── styles.scss                  # Global styles + CSS variables
│
├── angular.json                     # Angular build configuration
├── package.json                     # Frontend dependencies
└── tsconfig.json                    # TypeScript configuration
```

#### Backend Structure

```
Angular/backend/
├── src/
│   ├── server.js                    # Express app setup + bootstrap
│   │
│   ├── config/
│   │   └── database.js              # MongoDB connection via Mongoose
│   │
│   ├── controllers/
│   │   ├── auth.controller.js       # Login + Register
│   │   ├── product.controller.js    # List + GetById
│   │   ├── cart.controller.js       # CRUD cart operations
│   │   ├── wishlist.controller.js   # CRUD wishlist operations
│   │   ├── order.controller.js      # Checkout + GetMyOrders
│   │   └── admin.controller.js      # Admin CRUD + order management
│   │
│   ├── models/
│   │   ├── user.model.js            # User schema
│   │   ├── product.model.js         # Product schema
│   │   ├── cart-item.model.js       # CartItem schema (with unique index)
│   │   ├── wishlist-item.model.js   # WishlistItem schema (with unique index)
│   │   └── order.model.js           # Order schema with embedded items
│   │
│   ├── middleware/
│   │   ├── user-auth.js             # JWT Bearer token verification
│   │   └── admin-auth.js            # x-admin-token header verification
│   │
│   ├── routes/
│   │   └── index.js                 # All API route definitions
│   │
│   └── data/
│       └── seed-products.js         # Initial product data seeder
│
├── uploads/                         # Product image storage directory
├── package.json                     # Backend dependencies
└── .env.example                     # Environment variables template
```

---

### 6.3 API Endpoints

**Base URL:** `http://localhost:3000/api/v1`

#### Public Endpoints (No Authentication)

| Method | Endpoint | Description | Request Body | Response |
|--------|----------|-------------|--------------|----------|
| GET | `/health` | Health check | — | `{ status: 'ok' }` |
| GET | `/products` | List all products | Query: `?category=men` | `Product[]` |
| GET | `/products/:id` | Get product by ID | — | `Product` |
| POST | `/auth/register` | Register new user | `{ fullName, email, password }` | `{ user }` |
| POST | `/auth/login` | Login user | `{ email, password }` | `{ accessToken, user }` |

#### Customer Endpoints (Require JWT Bearer Token)

| Method | Endpoint | Description | Request Body | Response |
|--------|----------|-------------|--------------|----------|
| GET | `/cart` | Get user's cart | — | `Product[] (with quantity)` |
| POST | `/cart/items` | Add to cart | `{ productId }` | `CartItem` |
| PUT | `/cart/items/:id` | Update quantity | `{ quantity }` | `CartItem` |
| DELETE | `/cart/items/:id` | Remove from cart | — | `204 No Content` |
| DELETE | `/cart` | Clear entire cart | — | `{ message }` |
| GET | `/wishlist` | Get wishlist | — | `Product[]` |
| POST | `/wishlist/items` | Add to wishlist | `{ productId }` | `WishlistItem` |
| DELETE | `/wishlist/items/:id` | Remove from wishlist | — | `204 No Content` |
| POST | `/orders/checkout` | Place order | `{ customerName, email, address, items, total }` | `{ message, order }` |
| GET | `/orders` | Get my orders | — | `Order[]` |

#### Admin Endpoints (Require x-admin-token Header)

| Method | Endpoint | Description | Request Body | Response |
|--------|----------|-------------|--------------|----------|
| GET | `/admin/products` | List all products | — | `Product[]` |
| POST | `/admin/products` | Create product | `FormData (image file)` | `Product` |
| PUT | `/admin/products/:id` | Update product | `FormData (image file)` | `Product` |
| DELETE | `/admin/products/:id` | Delete product | — | `204 No Content` |
| GET | `/admin/orders` | List all orders | — | `Order[]` |
| PUT | `/admin/orders/:id/status` | Update order status | `{ status }` | `Order` |

---

### 6.4 Frontend Components

#### 1. AppComponent (Root)
**File:** `app.component.ts`
**Purpose:** Root component containing the navigation bar, search overlay, mobile drawer, and footer

**Properties:**
| Property | Type | Description |
|----------|------|-------------|
| searchText | string | Search input binding |
| year | number | Current year for footer copyright |
| isScrolled | boolean | Scroll detection for navbar shadow |
| mobileMenuOpen | boolean | Mobile drawer toggle |
| searchOpen | boolean | Search overlay toggle |
| userMenuOpen | boolean | User dropdown toggle |

**Methods:**
| Method | Description |
|--------|-------------|
| `onScroll()` | HostListener — detects scroll > 10px for shadow effect |
| `onDocumentClick(event)` | HostListener — closes user menu on outside click |
| `isCustomerLoggedIn()` | Checks AuthService for active session |
| `logoutCustomer()` | Calls auth.logout(), closes menus |
| `customerName()` | Returns logged-in user's full name |

---

#### 2. HomeComponent
**File:** `pages/home/home.component.ts`
**Purpose:** Landing page with hero section, categories, featured products, and random product spotlight

**Sections:**
1. **Hero Section** — Gradient text title, animated floating blob, floating cards
2. **Stats Bar** — 4-column metrics (500+ Products, 10K+ Customers, 4.8 Rating, 24/7 Support)
3. **Shop by Category** — 4 gradient cards (Men, Women, Kids, New) with hover animations
4. **Random Product Spotlight** — Random product with "Shuffle Again" button
5. **Featured Products** — Grid of first 6 products using ProductCardComponent
6. **CTA Banner** — Dark gradient banner with registration call-to-action

**Methods:**
| Method | Description |
|--------|-------------|
| `ngOnInit()` | Fetches all products, sets featured (first 6), picks random |
| `pickRandom()` | Selects random product from all items |
| `addRandomToCart()` | Adds the random pick to cart |

---

#### 3. ShopComponent
**File:** `pages/shop/shop.component.ts`
**Purpose:** Product listing with search and filter

**Features:**
- Loads all products on init
- Listens to router query params for search text
- Filters products by name matching search query
- Displays filtered results in responsive grid

---

#### 4. ProductDetailsComponent
**File:** `pages/product-details/product-details.component.ts`
**Purpose:** Single product detail view

**Features:**
- Fetches product by route param ID
- Shows full-size image, name, price, description
- Add to Cart and Add to Wishlist buttons
- Loading spinner while fetching
- Handles invalid product IDs

---

#### 5. CartComponent
**File:** `pages/cart/cart.component.ts`
**Purpose:** Shopping cart management

**Features:**
- Displays all cart items with images, names, prices, quantities
- Quantity update controls
- Remove item button
- Grand total (auto-computed via Signal)
- "Proceed to Checkout" button

---

#### 6. CheckoutComponent
**File:** `pages/checkout/checkout.component.ts`
**Purpose:** Order placement form

**Form Fields:** customerName, email, address
**Validation:** All fields required, email format check
**Flow:** Validate → POST checkout → Show success → Clear cart → Redirect to orders

---

#### 7. AdminDashboardComponent
**File:** `pages/admin-dashboard/admin-dashboard.component.ts`
**Purpose:** Admin panel with tabbed interface

**Tabs:**
1. **Dashboard** — Create Product form with image upload
2. **Products** — Paginated product table with Edit/Delete buttons
3. **Orders** — Paginated order table with status dropdown

**Edit Modal Properties:**
| Property | Type | Description |
|----------|------|-------------|
| editModalOpen | boolean | Modal visibility |
| editForm | object | Form data (name, category, price, description) |
| editSelectedFile | File | New image file |
| editImagePreview | string | Image preview URL |
| editSaving | boolean | Loading state |

**Key Methods:**
| Method | Description |
|--------|-------------|
| `addProduct()` | Create FormData → POST to admin API |
| `deleteProduct(id)` | SweetAlert confirm → DELETE |
| `openEditModal(product)` | Pre-fill form → Show modal |
| `saveEdit()` | Create FormData → PUT to admin API |
| `updateStatus(id, event)` | Update order status |

---

#### 8. ProductCardComponent (Shared)
**File:** `shared/product-card/product-card.component.ts`
**Purpose:** Reusable product display card used across Home, Shop, and Category pages

**Input:** `@Input() product: Product`
**Methods:**
- `addToCart()` — Calls `CartService.add(this.product)`
- `addToWishlist()` — Calls `WishlistService.add(this.product.id)`

---

### 6.5 Frontend Services

#### 1. AuthService
**File:** `core/services/auth.service.ts`
**Purpose:** Handle customer authentication and reactive session state

**State Management:**
```typescript
currentUser: Signal<AuthUser | null>  // Reactive user state
tokenKey = 'wohl-auth-token'          // localStorage key for JWT
userKey  = 'wohl-auth-user'           // localStorage key for user object
```

**Methods:**

| Method | Return Type | Description |
|--------|-------------|-------------|
| `login(email, password)` | `Observable<LoginResponse>` | POST /auth/login → stores token + user in localStorage → updates signal |
| `register(payload)` | `Observable<{user}>` | POST /auth/register with fullName, email, password |
| `logout()` | `void` | Clears localStorage, resets signal, dispatches 'auth:logout' event |
| `getToken()` | `string \| null` | Returns stored JWT token |
| `getUser()` | `AuthUser \| null` | Returns current user from signal |

---

#### 2. ProductService
**File:** `core/services/product.service.ts`

| Method | Return Type | API Call |
|--------|-------------|----------|
| `getProducts(category?)` | `Observable<Product[]>` | GET /products or /products?category=X |
| `getProductById(id)` | `Observable<Product>` | GET /products/:id |

---

#### 3. CartService
**File:** `core/services/cart.service.ts`
**Purpose:** Reactive cart state management with API sync

**State:**
```typescript
_items: WritableSignal<Product[]>     // Internal cart items
items: Signal<Product[]>              // Read-only public signal
total: Signal<number>                 // Computed: sum of (price × quantity)
```

| Method | Description |
|--------|-------------|
| `sync()` | GET /cart → updates _items signal |
| `add(product)` | Auth check → POST /cart/items → sync() → SweetAlert toast |
| `updateQuantity(productId, qty)` | PUT /cart/items/:id → sync() |
| `remove(id)` | DELETE /cart/items/:id → sync() |
| `clear()` | DELETE /cart → clears _items signal |

---

#### 4. WishlistService
**File:** `core/services/wishlist.service.ts`

| Method | Description |
|--------|-------------|
| `sync()` | GET /wishlist → updates items signal |
| `add(productId)` | POST /wishlist/items → sync() → SweetAlert toast |
| `remove(productId)` | DELETE /wishlist/items/:id → sync() |

---

#### 5. OrderService
**File:** `core/services/order.service.ts`

| Method | Return Type | API Call |
|--------|-------------|----------|
| `checkout(payload)` | `Observable<{message, order}>` | POST /orders/checkout |
| `getOrders()` | `Observable<Order[]>` | GET /orders |

---

#### 6. AdminService
**File:** `core/services/admin.service.ts`
**Auth Header:** `x-admin-token: admin-secret`

| Method | Return Type | API Call |
|--------|-------------|----------|
| `getProducts()` | `Observable<Product[]>` | GET /admin/products |
| `createProduct(formData)` | `Observable<Product>` | POST /admin/products |
| `updateProduct(id, formData)` | `Observable<Product>` | PUT /admin/products/:id |
| `deleteProduct(id)` | `Observable<void>` | DELETE /admin/products/:id |
| `getOrders()` | `Observable<Order[]>` | GET /admin/orders |
| `updateOrderStatus(id, status)` | `Observable<Order>` | PUT /admin/orders/:id/status |

---

#### 7. Interceptors

**API Prefix Interceptor** (`api-prefix.interceptor.ts`):
- Skips URLs starting with `http` (already absolute)
- Prepends `http://localhost:3000/api/v1` to relative URLs

**Auth Token Interceptor** (`auth-token.interceptor.ts`):
- Reads JWT from localStorage
- Adds `Authorization: Bearer <token>` header to all requests

---

#### 8. AdminAuthGuard
**File:** `core/services/admin-auth.guard.ts`
- Checks `AdminSessionService.isAuthenticated()` signal
- Returns `true` if authenticated → allows access to `/admin`
- Redirects to `/admin/login` if not authenticated

---

### 6.6 Backend Controllers

#### 1. Auth Controller (`auth.controller.js`)

**`login(req, res)`**
```
Input:  { email, password }
Flow:   Validate fields → Find user by email → bcrypt.compare → Generate JWT
Output: { accessToken: "jwt...", user: { id, fullName, email, role } }
Errors: 400 (missing fields), 401 (invalid credentials)
```

**`register(req, res)`**
```
Input:  { fullName, email, password }
Flow:   Validate → Check duplicate → Hash password (10 rounds) → Create user
Output: { user: { id, fullName, email, role } }
Errors: 400 (missing/short password), 409 (email exists)
```

---

#### 2. Product Controller (`product.controller.js`)

**`listProducts(req, res)`**
```
Input:  Query param: ?category=men (optional)
Flow:   Build filter → Find products → Sort by ID → Exclude _id
Output: Product[]
```

**`getProductById(req, res)`**
```
Input:  URL param: /products/:id
Flow:   Validate numeric ID → Find by ID
Output: Product
Errors: 400 (invalid ID), 404 (not found)
```

---

#### 3. Cart Controller (`cart.controller.js`)

**`getCart(req, res)`**
```
Flow:   Find all CartItems for req.user.userId
        → For each item, find Product by productId
        → Attach quantity from CartItem to Product
Output: Product[] (with quantity field)
```

**`addToCart(req, res)`**
```
Input:  { productId }
Flow:   Validate product exists → Upsert CartItem (increment quantity)
Output: CartItem
```

**`updateCartItem(req, res)`**
```
Input:  URL: /:id (productId), Body: { quantity }
Flow:   Find CartItem → Update quantity → Save
Output: CartItem
Errors: 404 (item not found), 400 (quantity < 1)
```

**`removeFromCart(req, res)`**
```
Input:  URL: /:id (productId)
Flow:   Delete CartItem by userId + productId
Output: 204 No Content
```

**`clearCart(req, res)`**
```
Flow:   Delete all CartItems for userId
Output: { message: "Cart cleared" }
```

---

#### 4. Wishlist Controller (`wishlist.controller.js`)

**`getWishlist(req, res)`**
```
Flow:   Find WishlistItems for user → Join with Products → Deduplicate
Output: Product[]
```

**`addWishlist(req, res)`**
```
Input:  { productId }
Flow:   Validate product → Create WishlistItem → Handle duplicate (11000 error)
Output: WishlistItem
```

**`removeWishlist(req, res)`**
```
Input:  URL: /:id (productId)
Flow:   Delete WishlistItem by userId + productId
Output: 204 No Content
```

---

#### 5. Order Controller (`order.controller.js`)

**`checkout(req, res)`**
```
Input:  { customerName, email, address, items: [{id, name, price, quantity}], total }
Flow:   Validate all fields → Validate email format
        → Get max order ID + 1 → Create Order document
Output: { message: "Order placed", order: Order }
Errors: 400 (missing fields, invalid email, empty items)
```

**`getMyOrders(req, res)`**
```
Flow:   Find orders by userId → Sort by createdAt DESC
Output: Order[]
```

---

#### 6. Admin Controller (`admin.controller.js`)

**`listAdminProducts(req, res)`**
```
Flow:   Find all products → Sort by ID → Exclude _id
Output: Product[]
```

**`createProduct(req, res)`**
```
Input:  FormData: { name, category, price, description, image (file) }
Flow:   Get max product ID + 1 → Save image to /uploads/ → Create Product
Output: Product (201 Created)
```

**`updateProduct(req, res)`**
```
Input:  URL: /:id, FormData: { name, category, price, description, image (file) }
Flow:   Find product → Update fields → Replace image if new file uploaded
Output: Updated Product
Errors: 404 (product not found)
```

**`deleteProduct(req, res)`**
```
Input:  URL: /:id
Flow:   Find and delete product by ID
Output: 204 No Content
Errors: 404 (product not found)
```

**`listOrders(req, res)`**
```
Flow:   Find all orders → Sort by createdAt DESC
Output: Order[]
```

**`updateOrderStatus(req, res)`**
```
Input:  URL: /:id, Body: { status }
Flow:   Validate status in ['placed','confirmed','shipped','delivered','cancelled']
        → Update order status
Output: Updated Order
Errors: 400 (invalid status), 404 (order not found)
```

---

### 6.7 Backend Middleware

#### User Auth Middleware (`user-auth.js`)

```javascript
function requireUser(req, res, next)
```

**Flow:**
1. Extract `Authorization` header
2. Parse `Bearer <token>` format
3. Verify JWT with secret (`JWT_SECRET` or default `'wohl-dev-secret'`)
4. Decode payload: `{ sub: userId, email, role }`
5. Attach `req.user = { userId, email, role }` to request
6. Call `next()` to proceed

**Error:** Returns `401 Unauthorized` if token is missing or invalid

**Applied to:** Cart, Wishlist, Order routes

---

#### Admin Auth Middleware (`admin-auth.js`)

```javascript
function requireAdmin(req, res, next)
```

**Flow:**
1. Read `x-admin-token` header from request
2. Compare with `ADMIN_TOKEN` env variable (default: `'admin-secret'`)
3. Call `next()` if match

**Error:** Returns `401 Unauthorized` if token is missing or invalid

**Applied to:** All `/admin/*` routes

---

## CHAPTER 7: SYSTEM TESTING

### Test Cases

#### 7.1 User Registration

| Test No. | Test Case | Input | Expected Output | Status |
|----------|-----------|-------|-----------------|--------|
| TC-01 | Register with valid data | fullName: "John", email: "john@test.com", password: "123456" | User created, redirect to login | Pass |
| TC-02 | Register with duplicate email | Same email as existing user | Error: "Email already registered" | Pass |
| TC-03 | Register with short password | password: "123" | Error: "Password must be at least 6 characters" | Pass |
| TC-04 | Register with empty fields | All fields empty | Form validation prevents submission | Pass |

#### 7.2 User Login

| Test No. | Test Case | Input | Expected Output | Status |
|----------|-----------|-------|-----------------|--------|
| TC-05 | Login with valid credentials | Correct email + password | JWT token received, redirect to home | Pass |
| TC-06 | Login with wrong password | Correct email, wrong password | Error: "Invalid credentials" | Pass |
| TC-07 | Login with non-existent email | Non-registered email | Error: "Invalid credentials" | Pass |

#### 7.3 Product Browsing

| Test No. | Test Case | Input | Expected Output | Status |
|----------|-----------|-------|-----------------|--------|
| TC-08 | View all products | Navigate to /shop | All products displayed in grid | Pass |
| TC-09 | Filter by category | Navigate to /men | Only men's products shown | Pass |
| TC-10 | View product details | Click product card | Product detail page with full info | Pass |
| TC-11 | Search products | Enter search text | Filtered products matching query | Pass |

#### 7.4 Shopping Cart

| Test No. | Test Case | Input | Expected Output | Status |
|----------|-----------|-------|-----------------|--------|
| TC-12 | Add to cart (logged in) | Click "Add to Cart" | Item added, success notification | Pass |
| TC-13 | Add to cart (not logged in) | Click "Add to Cart" | Login prompt shown | Pass |
| TC-14 | Update quantity | Change quantity input | Quantity updated, total recalculated | Pass |
| TC-15 | Remove from cart | Click "Remove" | Item removed from cart | Pass |
| TC-16 | Clear cart | Clear all items | Cart is empty | Pass |

#### 7.5 Wishlist

| Test No. | Test Case | Input | Expected Output | Status |
|----------|-----------|-------|-----------------|--------|
| TC-17 | Add to wishlist | Click "Wishlist" button | Item added to wishlist | Pass |
| TC-18 | Add duplicate to wishlist | Add same product again | Handled gracefully (no duplicate) | Pass |
| TC-19 | Remove from wishlist | Click "Remove" | Item removed from wishlist | Pass |

#### 7.6 Checkout & Orders

| Test No. | Test Case | Input | Expected Output | Status |
|----------|-----------|-------|-----------------|--------|
| TC-20 | Place order with valid data | Fill form + submit | Order created, cart cleared | Pass |
| TC-21 | Place order with empty cart | Submit with no items | Error: "Cart is empty" | Pass |
| TC-22 | View order history | Navigate to /orders | All past orders listed | Pass |

#### 7.7 Admin Panel

| Test No. | Test Case | Input | Expected Output | Status |
|----------|-----------|-------|-----------------|--------|
| TC-23 | Admin login (valid) | admin / admin123 | Redirect to admin dashboard | Pass |
| TC-24 | Admin login (invalid) | Wrong credentials | Error message shown | Pass |
| TC-25 | Create product | Fill form + upload image | Product created, success alert | Pass |
| TC-26 | Edit product | Click Edit, modify fields | Product updated successfully | Pass |
| TC-27 | Delete product | Click Delete + confirm | Product removed, success alert | Pass |
| TC-28 | Update order status | Select new status | Status updated, toast notification | Pass |
| TC-29 | Access admin without login | Navigate to /admin directly | Redirected to /admin/login | Pass |

---

## CHAPTER 8: LIMITATIONS & FUTURE SCOPE

### 8.1 Current Limitations

1. **No Payment Gateway** — The system does not integrate any payment processing (Razorpay, Stripe, PayPal)
2. **No Email Notifications** — Order confirmations and status updates are not sent via email
3. **No Inventory Management** — No stock tracking; products can be ordered regardless of availability
4. **Admin Credentials Hardcoded** — Admin login uses hardcoded credentials (`admin/admin123`)
5. **No Product Reviews/Ratings** — Customers cannot rate or review products
6. **No Address Management** — Users must re-enter shipping address for each order
7. **Single Image per Product** — Only one image can be uploaded per product

### 8.2 Future Scope of Enhancements

1. **Payment Integration** — Integrate Razorpay or Stripe for secure online payments
2. **Email Service** — Send order confirmations, shipping updates via Nodemailer or SendGrid
3. **Inventory System** — Track stock levels, show "Out of Stock" labels, prevent over-ordering
4. **Product Reviews** — Allow customers to rate and review products with star ratings
5. **Multiple Product Images** — Support image gallery with multiple uploads per product
6. **Address Book** — Save multiple shipping addresses per user
7. **Coupon/Discount System** — Apply promotional codes during checkout
8. **Order Invoice PDF** — Generate downloadable invoice PDFs for completed orders
9. **Push Notifications** — Real-time notifications for order status changes
10. **Analytics Dashboard** — Charts and graphs for sales, revenue, and user metrics in admin panel
11. **Social Login** — Google/Facebook OAuth integration for quick registration
12. **Progressive Web App (PWA)** — Offline support and installable app experience

---

## CHAPTER 9: REFERENCES

1. **Angular Documentation** — https://angular.dev/
2. **Angular Material** — https://material.angular.io/
3. **Node.js Documentation** — https://nodejs.org/docs/
4. **Express.js Guide** — https://expressjs.com/
5. **MongoDB Manual** — https://www.mongodb.com/docs/manual/
6. **Mongoose Documentation** — https://mongoosejs.com/docs/
7. **JWT Introduction** — https://jwt.io/introduction
8. **Bootstrap 5** — https://getbootstrap.com/docs/5.3/
9. **SweetAlert2** — https://sweetalert2.github.io/
10. **TypeScript Handbook** — https://www.typescriptlang.org/docs/
11. **RxJS Documentation** — https://rxjs.dev/guide/overview
12. **Multer Documentation** — https://github.com/expressjs/multer

---

**END OF PROJECT DOCUMENTATION**

*Prepared by: Navadiya Vishwa R. (124), Sutariya Bhavik B. (134), Kikani Nitanshu M. (156)*
*Guide: Ms. Sanskruti Ramani*
*Sutex Bank College of Computer Applications & Science, Amroli*
