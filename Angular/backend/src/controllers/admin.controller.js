const { products, orders } = require('../data/mock-db');

function listAdminProducts(_, res) {
  return res.json(products.sort((a, b) => a.id - b.id));
}

function createProduct(req, res) {
  const payload = req.body;

  if (!payload?.name || !payload?.category || payload?.price === undefined || !payload?.image || !payload?.description) {
    return res.status(400).json({ message: 'Invalid product payload' });
  }

  const nextId = products.length ? Math.max(...products.map((product) => product.id)) + 1 : 1;
  const product = {
    id: nextId,
    name: payload.name,
    category: payload.category,
    price: Number(payload.price),
    image: payload.image,
    description: payload.description
  };

  products.push(product);
  return res.status(201).json(product);
}

function updateProduct(req, res) {
  const productId = Number(req.params.id);
  const payload = req.body;
  const index = products.findIndex((product) => product.id === productId);

  if (index < 0) {
    return res.status(404).json({ message: 'Product not found' });
  }

  products[index] = {
    ...products[index],
    name: payload.name ?? products[index].name,
    category: payload.category ?? products[index].category,
    price: payload.price !== undefined ? Number(payload.price) : products[index].price,
    image: payload.image ?? products[index].image,
    description: payload.description ?? products[index].description
  };

  return res.json(products[index]);
}

function deleteProduct(req, res) {
  const productId = Number(req.params.id);
  const index = products.findIndex((product) => product.id === productId);

  if (index < 0) {
    return res.status(404).json({ message: 'Product not found' });
  }

  products.splice(index, 1);
  return res.status(204).send();
}

function listOrders(_, res) {
  return res.json(orders);
}

module.exports = {
  listAdminProducts,
  createProduct,
  updateProduct,
  deleteProduct,
  listOrders
};
