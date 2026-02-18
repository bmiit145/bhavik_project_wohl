require('dotenv').config();

const express = require('express');
const cors = require('cors');
const helmet = require('helmet');
const morgan = require('morgan');
const apiRoutes = require('./routes');
const { connectToDatabase } = require('./config/database');

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

async function bootstrap() {
  try {
    await connectToDatabase();

    app.listen(port, () => {
      // eslint-disable-next-line no-console
      console.log(`API server running on http://localhost:${port}`);
    });
  } catch (error) {
    // eslint-disable-next-line no-console
    console.error(`Failed to start server: ${error.message}`);
    process.exit(1);
  }
}

bootstrap();
