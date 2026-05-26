# ==========================================
# Stage 1: Compile Frontend Assets
# ==========================================
FROM node:20-alpine AS assets-builder
WORKDIR /app

# Install dependencies
COPY package*.json ./
RUN npm ci

# Copy code and run Vite compilation
COPY . .
RUN npm run build

# ==========================================
# Stage 2: Production Web Server
# ==========================================
FROM serversideup/php:8.2-fpm-nginx

# Enable custom container startup scripts
ENV AUTORUN_ENABLED=true

# Copy application code with correct owner permissions
COPY --chown=webuser:webgroup . /var/www/html

# Copy Vite-compiled static assets from Stage 1
COPY --chown=webuser:webgroup --from=assets-builder /app/public/build /var/www/html/public/build

# Install PHP production dependencies using Composer
RUN composer install --no-dev --optimize-autoloader

# Register startup script to run migrations and cache on deploy
COPY --chown=webuser:webgroup docker/startup.sh /etc/entrypoint.d/startup.sh
RUN chmod +x /etc/entrypoint.d/startup.sh
