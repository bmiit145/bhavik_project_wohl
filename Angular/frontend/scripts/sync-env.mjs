import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import dotenv from 'dotenv';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const frontendRoot = path.resolve(__dirname, '..');
const envPath = path.join(frontendRoot, '.env');
const targetPath = path.join(frontendRoot, 'src', 'environments', 'environment.ts');

dotenv.config({ path: envPath });

const apiBaseUrl = process.env.NG_APP_API_BASE_URL || 'http://localhost:3000/api/v1';
const escapedApiBaseUrl = apiBaseUrl.replace(/'/g, "\\'");

const content = `export const environment = {\n  apiBaseUrl: '${escapedApiBaseUrl}'\n};\n`;

fs.mkdirSync(path.dirname(targetPath), { recursive: true });
fs.writeFileSync(targetPath, content, 'utf8');

console.log(`Environment synced from ${envPath}`);
