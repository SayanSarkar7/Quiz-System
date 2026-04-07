# Stage 1 - Build Frontend
FROM node:18 AS frontend
WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# Stage 2 - Backend
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath intl gd exif

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Laravel env fix
COPY .env.example .env

# Copy frontend build
COPY --from=frontend /app/public/build ./public/build

# Install dependencies
RUN composer install --no-dev --optimize-autoloader -vvv

# Laravel setup
RUN php artisan key:generate && \
    php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Permissions
RUN chmod -R 777 storage bootstrap/cache

CMD ["php-fpm"]