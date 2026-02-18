const express = require('express');
const cors = require('cors');
const helmet = require('helmet');
const morgan = require('morgan');
const apiRoutes = require('./routes');

const app = express();
app.use(helmet());

const corsOrigin = process.env.CORS_ORIGIN;
if (corsOrigin) {
  app.use(
    cors({
      origin: corsOrigin.split(',').map((origin) => origin.trim())
    })
  );
} else {
  app.use(cors());
}

app.use(express.json());
app.use(morgan('dev'));

app.use('/api/v1', apiRoutes);

const port = process.env.PORT || 3000;

app.listen(port, () => {
  // eslint-disable-next-line no-console
  console.log(`API server running on http://localhost:${port}`);
});
