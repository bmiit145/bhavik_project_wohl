# bhavik_project_wohl

This repository is now organized for PHP → Angular migration.

## Structure

- `PHP/` → existing working PHP e-commerce code.
- `Angular/frontend/` → Angular storefront conversion.
- `Angular/backend/` → API backend replacement.
- `docs/` → migration docs and route map.

## Quick start

### Backend
```bash
cd Angular/backend
npm install
npm run dev
```

### Frontend
```bash
cd Angular/frontend
npm install
npm start
```

Frontend consumes API from `http://localhost:3000/api/v1`.
