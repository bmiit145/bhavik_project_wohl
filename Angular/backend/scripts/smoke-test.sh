#!/usr/bin/env bash
set -euo pipefail

BASE_URL="${1:-http://127.0.0.1:3000/api/v1}"
ADMIN_TOKEN="${ADMIN_TOKEN:-admin-secret}"

printf 'Health check...\n'
curl -fsS "$BASE_URL/health" | jq .status

printf 'Create dummy product via admin API...\n'
created_product="$(curl -fsS -X POST "$BASE_URL/admin/products" \
  -H 'Content-Type: application/json' \
  -H "x-admin-token: $ADMIN_TOKEN" \
  -d '{"name":"Dummy API Product","category":"new","price":999,"image":"https://picsum.photos/300?smoke","description":"smoke test product"}')"
echo "$created_product" | jq .
product_id="$(echo "$created_product" | jq -r .id)"

printf 'Update dummy product...\n'
curl -fsS -X PUT "$BASE_URL/admin/products/$product_id" \
  -H 'Content-Type: application/json' \
  -H "x-admin-token: $ADMIN_TOKEN" \
  -d '{"price":1099,"description":"updated in smoke test"}' | jq .

printf 'Cart flow...\n'
curl -fsS -X POST "$BASE_URL/cart/items" -H 'Content-Type: application/json' -d '{"productId":1}' | jq .message
curl -fsS "$BASE_URL/cart" | jq 'length'
curl -fsS -X DELETE "$BASE_URL/cart/items/1" | jq .message

printf 'Wishlist flow...\n'
curl -fsS -X POST "$BASE_URL/wishlist/items" -H 'Content-Type: application/json' -d '{"productId":2}' | jq .message
curl -fsS "$BASE_URL/wishlist" | jq 'length'

printf 'Checkout + order list flow...\n'
curl -fsS -X POST "$BASE_URL/orders/checkout" -H 'Content-Type: application/json' \
  -d '{"customerName":"Smoke Tester","email":"smoke@test.com","address":"Test address","items":[{"id":2,"name":"Hydrating Serum","price":499}],"total":499}' | jq .order.id
curl -fsS "$BASE_URL/admin/orders" -H "x-admin-token: $ADMIN_TOKEN" | jq 'length'

printf 'Cleanup dummy product...\n'
curl -fsS -o /dev/null -X DELETE "$BASE_URL/admin/products/$product_id" -H "x-admin-token: $ADMIN_TOKEN"

printf 'Smoke test completed successfully.\n'
