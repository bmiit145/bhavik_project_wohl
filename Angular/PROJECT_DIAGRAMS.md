# WOHL REACTIONS COSMETIC STORE — System Diagrams

> **Project:** Wohl Reactions Cosmetic Store
> **Stack:** Angular 19 + Node.js/Express + MongoDB
> **Prepared by:** Navadiya Vishwa (124), Sutariya Bhavik (134), Kikani Nitanshu (156)
> **Guide:** Ms. Sanskruti Ramani
> **College:** Sutex Bank College of Computer Applications & Science, Amroli

---

## Table of Contents

| # | Diagram | Description |
|---|---------|-------------|
| 1 | System Architecture | Three-tier architecture overview |
| 2 | Entity-Relationship Diagram | Database entities and relationships |
| 3 | Data Flow Diagram — Level 0 | Context-level system boundary |
| 4 | Data Flow Diagram — Level 1 | Detailed process decomposition |
| 5 | User Authentication Flow | Login & registration sequence |
| 6 | Order Placement Flow | Cart to order lifecycle |
| 7 | Admin Authentication Flow | Admin login & session management |
| 8 | Product Management Flow | Admin CRUD operations on products |
| 9 | Frontend Component Hierarchy | Angular component tree |
| 10 | Service Dependency Map | Frontend services and their interactions |
| 11 | API Route Map | All REST API endpoints |
| 12 | Angular Routing Diagram | Frontend route structure |
| 13 | Cart & Wishlist Flow | Add-to-cart and wishlist operations |
| 14 | Deployment Architecture | Server and build layout |

---

## 1. System Architecture (Three-Tier)

```mermaid
graph TB
    subgraph Presentation["🖥️ PRESENTATION TIER (Client)"]
        A1[Angular 19 SPA]
        A2[Angular Material 19]
        A3[Bootstrap 5]
        A4[SweetAlert2]
    end

    subgraph Logic["⚙️ BUSINESS LOGIC TIER (Server)"]
        B1[Node.js Runtime]
        B2[Express.js 4.19]
        B3[JWT Authentication]
        B4[Multer File Upload]
        B5[REST API — /api/v1]
    end

    subgraph Data["🗄️ DATA TIER (Database)"]
        C1[(MongoDB)]
        C2[Mongoose 8.5 ODM]
        C3[Users Collection]
        C4[Products Collection]
        C5[Orders Collection]
        C6[CartItems Collection]
        C7[WishlistItems Collection]
    end

    A1 -->|HTTP Requests| B5
    B5 -->|JSON Responses| A1
    B2 --> B3
    B2 --> B4
    B1 --> B2
    B2 -->|Mongoose Queries| C2
    C2 --> C1
    C1 --- C3
    C1 --- C4
    C1 --- C5
    C1 --- C6
    C1 --- C7

    style Presentation fill:#e3f2fd,stroke:#1565c0,stroke-width:2px
    style Logic fill:#fff3e0,stroke:#e65100,stroke-width:2px
    style Data fill:#e8f5e9,stroke:#2e7d32,stroke-width:2px
```

---

## 2. Entity-Relationship Diagram (ERD)

```mermaid
erDiagram
    USER {
        ObjectId _id PK
        String fullName
        String email UK
        String passwordHash
        Enum role "customer | admin"
        Date createdAt
        Date updatedAt
    }

    PRODUCT {
        ObjectId _id PK
        Number id UK "auto-increment"
        String name
        Enum category "men | women | kid | new"
        Number price
        String image
        String description
        String phone
    }

    CART_ITEM {
        ObjectId _id PK
        ObjectId userId FK
        Number productId FK
        Number quantity "default: 1, min: 1"
        Date createdAt
        Date updatedAt
    }

    WISHLIST_ITEM {
        ObjectId _id PK
        ObjectId userId FK
        Number productId FK
        Date createdAt
        Date updatedAt
    }

    ORDER {
        ObjectId _id PK
        Number id UK "auto-increment"
        ObjectId userId FK
        String customerName
        String email
        String address
        Number total
        String status "default: placed"
        Date createdAt
    }

    ORDER_ITEM {
        Number id
        String name
        Number price
        Number quantity "default: 1"
    }

    USER ||--o{ CART_ITEM : "has in cart"
    USER ||--o{ WISHLIST_ITEM : "has in wishlist"
    USER ||--o{ ORDER : "places"
    PRODUCT ||--o{ CART_ITEM : "added to cart"
    PRODUCT ||--o{ WISHLIST_ITEM : "wishlisted"
    ORDER ||--|{ ORDER_ITEM : "contains"
```

---

## 3. Data Flow Diagram — Level 0 (Context Diagram)

```mermaid
graph LR
    Customer((Customer))
    Admin((Admin))
    System[("Wohl Reactions\nCosmetic Store\nSystem")]
    DB[(MongoDB\nDatabase)]

    Customer -->|"Browse products\nRegister / Login\nAdd to cart / wishlist\nPlace orders"| System
    System -->|"Product listings\nOrder confirmations\nCart & wishlist data"| Customer

    Admin -->|"Add / Edit / Delete products\nView orders\nUpdate order status"| System
    System -->|"Product list\nOrder list\nDashboard data"| Admin

    System <-->|"Read / Write data"| DB

    style System fill:#fff3e0,stroke:#e65100,stroke-width:2px
    style DB fill:#e8f5e9,stroke:#2e7d32,stroke-width:2px
```

---

## 4. Data Flow Diagram — Level 1

```mermaid
graph TB
    Customer((Customer))
    Admin((Admin))

    subgraph System["Wohl Reactions System"]
        P1["1.0\nAuthentication\nProcess"]
        P2["2.0\nProduct\nBrowsing"]
        P3["3.0\nCart\nManagement"]
        P4["4.0\nWishlist\nManagement"]
        P5["5.0\nOrder\nProcessing"]
        P6["6.0\nAdmin Product\nManagement"]
        P7["7.0\nAdmin Order\nManagement"]
    end

    DS1[(Users Store)]
    DS2[(Products Store)]
    DS3[(Cart Store)]
    DS4[(Wishlist Store)]
    DS5[(Orders Store)]

    Customer -->|"email, password"| P1
    P1 -->|"JWT token, user data"| Customer
    P1 <-->|"Read / Write"| DS1

    Customer -->|"category filter"| P2
    P2 -->|"product list"| Customer
    P2 <-->|"Read"| DS2

    Customer -->|"product ID, qty"| P3
    P3 -->|"cart items, total"| Customer
    P3 <-->|"Read / Write"| DS3

    Customer -->|"product ID"| P4
    P4 -->|"wishlist items"| Customer
    P4 <-->|"Read / Write"| DS4

    Customer -->|"order details"| P5
    P5 -->|"order confirmation"| Customer
    P5 <-->|"Read / Write"| DS5

    Admin -->|"product data + image"| P6
    P6 -->|"product list"| Admin
    P6 <-->|"Read / Write"| DS2

    Admin -->|"order ID, status"| P7
    P7 -->|"order list"| Admin
    P7 <-->|"Read / Write"| DS5

    style System fill:#f5f5f5,stroke:#616161,stroke-width:2px
```

---

## 5. User Authentication Flow

```mermaid
sequenceDiagram
    participant U as User (Browser)
    participant AC as Angular<br/>AuthService
    participant INT as Auth Token<br/>Interceptor
    participant API as Express<br/>Auth Controller
    participant DB as MongoDB<br/>Users

    Note over U,DB: === REGISTRATION ===
    U->>AC: register(fullName, email, password)
    AC->>API: POST /api/v1/auth/register
    API->>API: Validate inputs<br/>(password >= 6 chars)
    API->>DB: Check email uniqueness
    DB-->>API: No duplicate found
    API->>API: bcrypt.hash(password, 10)
    API->>DB: Create user document
    DB-->>API: User saved
    API-->>AC: { token, user }
    AC->>AC: Store in localStorage<br/>(wohl-auth-token, wohl-auth-user)
    AC->>AC: Update currentUser signal
    AC-->>U: Registration success

    Note over U,DB: === LOGIN ===
    U->>AC: login(email, password)
    AC->>API: POST /api/v1/auth/login
    API->>DB: Find user by email
    DB-->>API: User document
    API->>API: bcrypt.compare(password, hash)
    API->>API: jwt.sign({ sub: userId,<br/>email, role }, secret, 7d)
    API-->>AC: { token, user }
    AC->>AC: Store in localStorage
    AC->>AC: Update currentUser signal
    AC->>AC: Sync cart & wishlist
    AC-->>U: Login success

    Note over U,DB: === AUTHENTICATED REQUEST ===
    U->>AC: Any API call
    AC->>INT: HTTP Request
    INT->>INT: Read token from<br/>localStorage
    INT->>API: Request + Authorization:<br/>Bearer {token}
    API->>API: Verify JWT, extract<br/>userId, email, role
    API-->>U: Protected response
```

---

## 6. Order Placement Flow

```mermaid
sequenceDiagram
    participant U as User
    participant Cart as CartComponent
    participant Checkout as CheckoutComponent
    participant CS as CartService
    participant OS as OrderService
    participant API as Express API
    participant DB as MongoDB

    U->>Cart: View cart items
    Cart->>CS: Read items signal
    CS-->>Cart: Cart items + total

    U->>Cart: Click "Proceed to Checkout"
    Cart->>Checkout: Navigate to /checkout

    U->>Checkout: Fill form<br/>(name, email, address)
    U->>Checkout: Click "Place Order"

    Checkout->>OS: checkout({ customerName,<br/>email, address, items, total })
    OS->>API: POST /api/v1/orders/checkout
    API->>API: Validate payload<br/>(name, address, email, items)
    API->>DB: Find max order ID
    API->>DB: Create order (id + 1)
    DB-->>API: Order saved
    API-->>OS: { order data }
    OS-->>Checkout: Success response

    Checkout->>CS: clear()
    CS->>API: DELETE /api/v1/cart
    API->>DB: Delete all cart items
    DB-->>API: Cart cleared

    Checkout->>U: Navigate to /orders<br/>+ SweetAlert success
```

---

## 7. Admin Authentication Flow

```mermaid
sequenceDiagram
    participant A as Admin User
    participant AL as AdminLogin<br/>Component
    participant ASS as AdminSession<br/>Service
    participant Guard as adminAuth<br/>Guard
    participant AD as AdminDashboard<br/>Component

    A->>AL: Enter username & password
    AL->>ASS: login(username, password)
    ASS->>ASS: Check credentials<br/>(admin / admin123)

    alt Valid Credentials
        ASS->>ASS: Set isAuthenticated = true
        ASS->>ASS: localStorage.set<br/>(wohl-admin-auth, true)
        ASS-->>AL: return true
        AL->>A: Navigate to /admin
        A->>Guard: Route access /admin
        Guard->>ASS: Check isAuthenticated()
        ASS-->>Guard: true
        Guard-->>AD: Allow access
        AD->>A: Show dashboard
    else Invalid Credentials
        ASS-->>AL: return false
        AL->>A: Show error message
    end

    Note over A,AD: === API CALLS ===
    AD->>AD: AdminService adds header<br/>x-admin-token: admin-secret
    AD->>AD: Backend verifies<br/>admin-auth middleware
```

---

## 8. Product Management Flow (Admin)

```mermaid
flowchart TB
    Start([Admin Dashboard])
    Start --> Tab{Select Tab}

    Tab -->|Products| PList[View Products List<br/>Paginated — 5/page]

    PList --> Create[Click 'Add Product']
    PList --> Edit[Click 'Edit' on Product]
    PList --> Delete[Click 'Delete' on Product]

    Create --> Form1[Fill Product Form<br/>name, category, price,<br/>description, image upload]
    Form1 --> Submit1[Submit Form]
    Submit1 --> API1[POST /api/v1/admin/products<br/>Content-Type: multipart/form-data]
    API1 --> Multer1[Multer saves image<br/>to /uploads directory]
    Multer1 --> DB1[(Save product to MongoDB)]
    DB1 --> Refresh1[Refresh product list]
    Refresh1 --> PList

    Edit --> Modal[Open Edit Modal<br/>Pre-filled form fields]
    Modal --> Form2[Modify fields +<br/>optional new image]
    Form2 --> Submit2[Save Changes]
    Submit2 --> API2[PUT /api/v1/admin/products/:id<br/>Content-Type: multipart/form-data]
    API2 --> Multer2[Multer saves new image<br/>if provided]
    Multer2 --> DB2[(Update product in MongoDB)]
    DB2 --> Refresh2[Refresh product list]
    Refresh2 --> PList

    Delete --> Confirm[SweetAlert2<br/>Confirmation Dialog]
    Confirm -->|Yes| API3[DELETE /api/v1/admin/products/:id]
    API3 --> DB3[(Delete from MongoDB)]
    DB3 --> Refresh3[Refresh product list]
    Refresh3 --> PList
    Confirm -->|No| PList

    style Start fill:#e3f2fd,stroke:#1565c0
    style DB1 fill:#e8f5e9,stroke:#2e7d32
    style DB2 fill:#e8f5e9,stroke:#2e7d32
    style DB3 fill:#e8f5e9,stroke:#2e7d32
```

---

## 9. Frontend Component Hierarchy

```mermaid
graph TB
    Root["AppComponent<br/>(Root)"]

    Root --> Navbar["Navbar<br/>(mat-toolbar)"]
    Root --> Router["RouterOutlet"]
    Root --> Footer["Footer Section"]

    subgraph Pages["Page Components"]
        Router --> Home["HomeComponent"]
        Router --> Shop["ShopComponent"]
        Router --> PD["ProductDetailsComponent"]
        Router --> Cart["CartComponent"]
        Router --> Checkout["CheckoutComponent"]
        Router --> Orders["OrdersComponent"]
        Router --> Login["LoginComponent"]
        Router --> Register["RegisterComponent"]
        Router --> Profile["ProfileComponent"]
        Router --> Wishlist["WishlistComponent"]
        Router --> Contact["ContactComponent"]
        Router --> About["AboutComponent"]
        Router --> ForgotPw["ForgotPasswordComponent"]
    end

    subgraph CategoryPages["Category Pages"]
        Router --> Men["MenComponent"]
        Router --> Women["WomenComponent"]
        Router --> Kid["KidComponent"]
        Router --> NewArr["NewArrivalsComponent"]
    end

    subgraph AdminPages["Admin Pages"]
        Router --> ALogin["AdminLoginComponent"]
        Router --> ADash["AdminDashboardComponent"]
    end

    subgraph SharedComponents["Shared / Child Components"]
        Home --> PC1["ProductCardComponent"]
        Shop --> PC2["ProductCardComponent"]
        Men --> PC3["ProductCardComponent"]
        Women --> PC4["ProductCardComponent"]
        Kid --> PC5["ProductCardComponent"]
        NewArr --> PC6["ProductCardComponent"]
    end

    ADash --> TabDash["Dashboard Tab"]
    ADash --> TabProd["Products Tab"]
    ADash --> TabOrd["Orders Tab"]
    ADash --> EditModal["Edit Product Modal"]

    style Root fill:#e3f2fd,stroke:#1565c0,stroke-width:2px
    style Pages fill:#f5f5f5,stroke:#9e9e9e
    style CategoryPages fill:#fce4ec,stroke:#c62828
    style AdminPages fill:#fff3e0,stroke:#e65100
    style SharedComponents fill:#f3e5f5,stroke:#6a1b9a
```

---

## 10. Service Dependency Map

```mermaid
graph LR
    subgraph Components["Components"]
        Home["Home"]
        Shop["Shop"]
        CartComp["Cart"]
        CheckoutComp["Checkout"]
        OrdersComp["Orders"]
        WishlistComp["Wishlist"]
        LoginComp["Login"]
        RegisterComp["Register"]
        AdminDash["Admin Dashboard"]
        AdminLogin["Admin Login"]
    end

    subgraph Services["Core Services"]
        AuthSvc["AuthService<br/>🔐 Signal: currentUser"]
        ProductSvc["ProductService"]
        CartSvc["CartService<br/>🛒 Signal: items, total"]
        OrderSvc["OrderService"]
        WishlistSvc["WishlistService<br/>❤️ Signal: items"]
        AdminSvc["AdminService"]
        AdminSessSvc["AdminSessionService<br/>🔑 Signal: isAuthenticated"]
    end

    subgraph Interceptors["HTTP Interceptors"]
        ApiPrefix["apiPrefixInterceptor<br/>Prepends /api/v1"]
        AuthToken["authTokenInterceptor<br/>Adds Bearer token"]
    end

    subgraph Guard["Route Guard"]
        AdminGuard["adminAuthGuard"]
    end

    Home --> ProductSvc
    Home --> CartSvc
    Shop --> ProductSvc
    Shop --> CartSvc
    CartComp --> CartSvc
    CheckoutComp --> CartSvc
    CheckoutComp --> OrderSvc
    OrdersComp --> OrderSvc
    WishlistComp --> WishlistSvc
    LoginComp --> AuthSvc
    RegisterComp --> AuthSvc
    AdminDash --> AdminSvc
    AdminLogin --> AdminSessSvc
    AdminGuard --> AdminSessSvc

    CartSvc --> AuthSvc
    WishlistSvc --> AuthSvc

    AuthSvc --> AuthToken
    ProductSvc --> ApiPrefix
    CartSvc --> ApiPrefix
    CartSvc --> AuthToken
    OrderSvc --> ApiPrefix
    OrderSvc --> AuthToken
    WishlistSvc --> ApiPrefix
    WishlistSvc --> AuthToken
    AdminSvc --> ApiPrefix

    style Services fill:#e3f2fd,stroke:#1565c0
    style Interceptors fill:#fff3e0,stroke:#e65100
    style Guard fill:#fce4ec,stroke:#c62828
```

---

## 11. API Route Map

```mermaid
graph LR
    subgraph Public["🌐 Public Routes"]
        H["GET /health"]
        PL["GET /products"]
        PD["GET /products/:id"]
        PR["GET /products/random"]
        LI["POST /auth/login"]
        RE["POST /auth/register"]
    end

    subgraph User["🔐 User Routes (JWT Required)"]
        CG["GET /cart"]
        CA["POST /cart/items"]
        CU["PUT /cart/items/:id"]
        CD["DELETE /cart/items/:id"]
        CC["DELETE /cart"]
        WG["GET /wishlist"]
        WA["POST /wishlist/items"]
        WD["DELETE /wishlist/items/:id"]
        OC["POST /orders/checkout"]
        OG["GET /orders"]
    end

    subgraph Admin["🛡️ Admin Routes (x-admin-token)"]
        APL["GET /admin/products"]
        APC["POST /admin/products"]
        APU["PUT /admin/products/:id"]
        APD["DELETE /admin/products/:id"]
        AOL["GET /admin/orders"]
        AOS["PUT /admin/orders/:id/status"]
    end

    API["/api/v1"] --> Public
    API --> User
    API --> Admin

    style Public fill:#e8f5e9,stroke:#2e7d32,stroke-width:2px
    style User fill:#e3f2fd,stroke:#1565c0,stroke-width:2px
    style Admin fill:#fff3e0,stroke:#e65100,stroke-width:2px
```

---

## 12. Angular Routing Diagram

```mermaid
graph TB
    Root["/ (Root)"]

    Root --> Home["'' → HomeComponent"]
    Root --> Shop["'shop' → ShopComponent"]
    Root --> Product["'product/:id' → ProductDetailsComponent"]
    Root --> Cart["'cart' → CartComponent"]
    Root --> Checkout["'checkout' → CheckoutComponent"]
    Root --> Orders["'orders' → OrdersComponent"]
    Root --> Profile["'profile' → ProfileComponent"]
    Root --> Wishlist["'wishlist' → WishlistComponent"]

    Root --> Login["'login' → LoginComponent"]
    Root --> Register["'register' → RegisterComponent"]
    Root --> Forgot["'forgot-password' → ForgotPasswordComponent"]

    Root --> Men["'men' → MenComponent"]
    Root --> Women["'women' → WomenComponent"]
    Root --> Kid["'kid' → KidComponent"]
    Root --> New["'new' → NewArrivalsComponent"]

    Root --> Contact["'contact' → ContactComponent"]
    Root --> About["'about' → AboutComponent"]

    Root --> ALogin["'admin/login' → AdminLoginComponent"]
    Root --> ADash["'admin' → AdminDashboardComponent"]
    Root --> NotFound["'**' → NotFoundComponent"]

    ADash ---|"🛡️ adminAuthGuard"| Guard{Authenticated?}
    Guard -->|Yes| Allow["Load Dashboard"]
    Guard -->|No| Redirect["Redirect → /admin/login"]

    style Root fill:#e3f2fd,stroke:#1565c0,stroke-width:2px
    style Guard fill:#fff3e0,stroke:#e65100
    style NotFound fill:#ffebee,stroke:#c62828
```

---

## 13. Cart & Wishlist Flow

```mermaid
flowchart TB
    User([User Action])

    User -->|"Click Add to Cart"| AuthCheck1{Logged in?}
    AuthCheck1 -->|No| Prompt1["SweetAlert: Please login"]
    AuthCheck1 -->|Yes| AddCart["POST /api/v1/cart/items<br/>{ productId }"]
    AddCart --> UpsertCheck{Item exists<br/>in cart?}
    UpsertCheck -->|Yes| IncQty["Increment quantity + 1"]
    UpsertCheck -->|No| NewItem["Create new CartItem<br/>quantity: 1"]
    IncQty --> UpdateSignal1["Update CartService<br/>items signal"]
    NewItem --> UpdateSignal1
    UpdateSignal1 --> Badge1["Update cart badge<br/>count in navbar"]

    User -->|"Click Wishlist ❤️"| AuthCheck2{Logged in?}
    AuthCheck2 -->|No| Prompt2["SweetAlert: Please login"]
    AuthCheck2 -->|Yes| AddWish["POST /api/v1/wishlist/items<br/>{ productId }"]
    AddWish --> DupCheck{Already in<br/>wishlist?}
    DupCheck -->|Yes| Msg["Already in wishlist"]
    DupCheck -->|No| SaveWish["Create WishlistItem"]
    SaveWish --> UpdateSignal2["Update WishlistService<br/>items signal"]

    User -->|"Change quantity"| UpdateQty["PUT /api/v1/cart/items/:id<br/>{ quantity }"]
    UpdateQty --> UpdateSignal3["Update items signal<br/>+ recalculate total"]

    User -->|"Remove item"| RemoveItem["DELETE /api/v1/cart/items/:id"]
    RemoveItem --> UpdateSignal4["Remove from items signal<br/>+ recalculate total"]

    style User fill:#e3f2fd,stroke:#1565c0
    style Prompt1 fill:#ffebee,stroke:#c62828
    style Prompt2 fill:#ffebee,stroke:#c62828
```

---

## 14. Deployment Architecture

```mermaid
graph TB
    subgraph Client["Client Machine"]
        Browser["Web Browser"]
    end

    subgraph DevServer["Development Server"]
        subgraph Frontend["Angular Dev Server :4200"]
            NG["ng serve"]
            DIST["Compiled SPA<br/>(TypeScript → JavaScript)"]
        end

        subgraph Backend["Node.js Server :3000"]
            EXPRESS["Express.js Application"]
            CORS["CORS Middleware"]
            HELMET["Helmet Security"]
            MORGAN["Morgan Logger"]
            MULTER["Multer Uploads"]
            ROUTES["API Routes /api/v1"]
            STATIC["Static Files /uploads"]
        end

        subgraph Database["MongoDB :27017"]
            MONGO[(MongoDB Instance)]
            WOHL_DB["Database: wohl_db"]
        end

        subgraph FileSystem["File System"]
            UPLOADS["📁 /uploads<br/>Product Images"]
        end
    end

    Browser -->|"HTTP :4200"| NG
    Browser -->|"API Calls :3000"| EXPRESS
    EXPRESS --> CORS --> HELMET --> MORGAN
    EXPRESS --> ROUTES
    EXPRESS --> STATIC
    MULTER --> UPLOADS
    ROUTES -->|"Mongoose"| MONGO
    MONGO --- WOHL_DB

    style Client fill:#e3f2fd,stroke:#1565c0,stroke-width:2px
    style Frontend fill:#f3e5f5,stroke:#6a1b9a,stroke-width:2px
    style Backend fill:#fff3e0,stroke:#e65100,stroke-width:2px
    style Database fill:#e8f5e9,stroke:#2e7d32,stroke-width:2px
    style FileSystem fill:#fce4ec,stroke:#c62828,stroke-width:2px
```

---

## 15. Order Status Lifecycle

```mermaid
stateDiagram-v2
    [*] --> Placed : Customer places order
    Placed --> Confirmed : Admin confirms
    Placed --> Cancelled : Admin cancels
    Confirmed --> Shipped : Admin ships
    Confirmed --> Cancelled : Admin cancels
    Shipped --> Delivered : Admin marks delivered
    Delivered --> [*]
    Cancelled --> [*]

    note right of Placed : Initial status\nwhen order is created
    note right of Confirmed : Admin reviews\nand accepts order
    note right of Shipped : Order dispatched\nto customer
    note right of Delivered : Order received\nby customer
    note left of Cancelled : Can be cancelled\nbefore shipping
```

---

## 16. Database Schema Detail

```mermaid
classDiagram
    class User {
        +ObjectId _id
        +String fullName
        +String email
        +String passwordHash
        +String role
        +Date createdAt
        +Date updatedAt
    }

    class Product {
        +ObjectId _id
        +Number id
        +String name
        +String category
        +Number price
        +String image
        +String description
        +String phone
    }

    class CartItem {
        +ObjectId _id
        +ObjectId userId
        +Number productId
        +Number quantity
        +Date createdAt
        +Date updatedAt
    }

    class WishlistItem {
        +ObjectId _id
        +ObjectId userId
        +Number productId
        +Date createdAt
        +Date updatedAt
    }

    class Order {
        +ObjectId _id
        +Number id
        +ObjectId userId
        +String customerName
        +String email
        +String address
        +OrderItem[] items
        +Number total
        +String status
        +Date createdAt
    }

    class OrderItem {
        +Number id
        +String name
        +Number price
        +Number quantity
    }

    User "1" --> "*" CartItem : owns
    User "1" --> "*" WishlistItem : owns
    User "1" --> "*" Order : places
    Product "1" --> "*" CartItem : referenced by
    Product "1" --> "*" WishlistItem : referenced by
    Order "1" --> "*" OrderItem : contains
```

---

## 17. Middleware Pipeline

```mermaid
graph LR
    REQ["Incoming\nHTTP Request"]
    CORS["CORS\nMiddleware"]
    HELMET["Helmet\nSecurity Headers"]
    MORGAN["Morgan\nRequest Logger"]
    JSON["express.json()\nBody Parser"]
    STATIC["express.static\n/uploads"]
    ROUTER["API Router\n/api/v1"]

    subgraph RouteMiddleware["Route-Level Middleware"]
        JWT["requireAuth\n(JWT verify)"]
        ADMIN["requireAdmin\n(token check)"]
        UPLOAD["multer\n(file upload)"]
    end

    CONTROLLER["Controller\nHandler"]
    RES["HTTP\nResponse"]

    REQ --> CORS --> HELMET --> MORGAN --> JSON --> STATIC --> ROUTER
    ROUTER --> JWT --> CONTROLLER
    ROUTER --> ADMIN --> CONTROLLER
    ROUTER --> UPLOAD --> CONTROLLER
    CONTROLLER --> RES

    style REQ fill:#e3f2fd,stroke:#1565c0
    style RES fill:#e8f5e9,stroke:#2e7d32
    style RouteMiddleware fill:#fff3e0,stroke:#e65100
```

---

## 18. Signal-Based State Management

```mermaid
graph TB
    subgraph AuthService["AuthService"]
        AuthSignal["signal: currentUser<br/>WritableSignal&lt;User | null&gt;"]
    end

    subgraph CartService["CartService"]
        CartSignal["signal: items<br/>WritableSignal&lt;Product[]&gt;"]
        TotalComputed["computed: total<br/>Σ price × quantity"]
        CartSignal --> TotalComputed
    end

    subgraph WishlistService["WishlistService"]
        WishSignal["signal: items<br/>WritableSignal&lt;Product[]&gt;"]
    end

    subgraph AdminSessionService["AdminSessionService"]
        AdminSignal["signal: isAuthenticated<br/>WritableSignal&lt;boolean&gt;"]
    end

    subgraph Navbar["AppComponent (Navbar)"]
        CartBadge["Cart Badge Count"]
        UserMenu["User Menu / Login Buttons"]
        WishBadge["Wishlist Count"]
    end

    subgraph CartPage["CartComponent"]
        ItemList["Cart Item List"]
        TotalDisplay["Order Total"]
    end

    AuthSignal -->|"read"| UserMenu
    CartSignal -->|"read"| CartBadge
    CartSignal -->|"read"| ItemList
    TotalComputed -->|"read"| TotalDisplay
    WishSignal -->|"read"| WishBadge
    AdminSignal -->|"read"| AdminGuard["adminAuthGuard"]

    Login["Login Action"] -->|"set(user)"| AuthSignal
    AddToCart["Add to Cart"] -->|"update([...items])"| CartSignal
    AddWishlist["Add to Wishlist"] -->|"update([...items])"| WishSignal
    AdminLogin2["Admin Login"] -->|"set(true)"| AdminSignal

    style AuthService fill:#e3f2fd,stroke:#1565c0
    style CartService fill:#fff3e0,stroke:#e65100
    style WishlistService fill:#fce4ec,stroke:#c62828
    style AdminSessionService fill:#e8f5e9,stroke:#2e7d32
```

---

> **Note:** These diagrams use [Mermaid](https://mermaid.js.org/) syntax. They render automatically on **GitHub**, **GitLab**, **VS Code** (with Mermaid extension), and **Notion**. You can also paste them into the [Mermaid Live Editor](https://mermaid.live) to export as PNG/SVG for printed reports.
