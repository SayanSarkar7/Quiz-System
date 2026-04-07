# Stage 1 - Build Frontend (Vite)
FROM node:18 AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .

# Build Vite assets
RUN npm run build


# Stage 2 - Backend (Laravel + PHP + Composer)
FROM php:8.2-fpm AS backend

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy Laravel app
COPY . .

# ✅ Correct path for Laravel Vite build
COPY --from=frontend /app/public/build ./public/build

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel optimization
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Set permissions (important for Laravel)
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www/storage

CMD ["php-fpm"]