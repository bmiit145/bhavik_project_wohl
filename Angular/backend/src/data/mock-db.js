const products = [
  {
    id: 1,
    name: 'Charcoal Face Wash',
    category: 'men',
    price: 299,
    image: 'https://picsum.photos/seed/men-1/400/400',
    description: 'Deep cleansing face wash for daily use.'
  },
  {
    id: 2,
    name: 'Hydrating Beard Oil',
    category: 'men',
    price: 549,
    image: 'https://picsum.photos/seed/men-2/400/400',
    description: 'Nourishing beard oil with argan and almond extracts.'
  },
  {
    id: 3,
    name: 'Active Deodorant Spray',
    category: 'men',
    price: 249,
    image: 'https://picsum.photos/seed/men-3/400/400',
    description: 'Long-lasting freshness with sporty fragrance notes.'
  },
  {
    id: 4,
    name: 'Hydrating Serum',
    category: 'women',
    price: 499,
    image: 'https://picsum.photos/seed/women-1/400/400',
    description: 'Lightweight hydration serum for radiant skin.'
  },
  {
    id: 5,
    name: 'Vitamin C Day Cream',
    category: 'women',
    price: 699,
    image: 'https://picsum.photos/seed/women-2/400/400',
    description: 'Brightening day cream with SPF support.'
  },
  {
    id: 6,
    name: 'Rose Matte Lip Tint',
    category: 'women',
    price: 399,
    image: 'https://picsum.photos/seed/women-3/400/400',
    description: 'Long-wear matte tint with moisturizing finish.'
  },
  {
    id: 7,
    name: 'Kids Gentle Lotion',
    category: 'kid',
    price: 249,
    image: 'https://picsum.photos/seed/kid-1/400/400',
    description: 'Dermatologist-tested moisturizer for delicate skin.'
  },
  {
    id: 8,
    name: 'Bubble Bath Shampoo',
    category: 'kid',
    price: 329,
    image: 'https://picsum.photos/seed/kid-2/400/400',
    description: 'Tear-free hair and body wash for playful baths.'
  },
  {
    id: 9,
    name: 'Sun Shield Gel SPF 30',
    category: 'kid',
    price: 359,
    image: 'https://picsum.photos/seed/kid-3/400/400',
    description: 'Gentle UV protection gel for outdoor activities.'
  },
  {
    id: 10,
    name: 'Night Repair Cream',
    category: 'new',
    price: 699,
    image: 'https://picsum.photos/seed/new-1/400/400',
    description: 'Overnight skin repair cream for smooth texture.'
  },
  {
    id: 11,
    name: 'Niacinamide Glow Toner',
    category: 'new',
    price: 579,
    image: 'https://picsum.photos/seed/new-2/400/400',
    description: 'Pore-refining toner with niacinamide boost.'
  },
  {
    id: 12,
    name: 'Cooling After-Sun Mist',
    category: 'new',
    price: 449,
    image: 'https://picsum.photos/seed/new-3/400/400',
    description: 'Soothing post-sun care mist with aloe vera.'
  }
];

const cart = [];
const wishlist = [];
const orders = [];

module.exports = { products, cart, wishlist, orders };
