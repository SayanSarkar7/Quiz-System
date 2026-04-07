# Stage 1 - Build Frontend
FROM node:18 AS frontend
WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# Stage 2 - Backend (Apache + PHP)
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath intl gd exif

# Enable Apache mod_rewrite (Laravel needs this)
RUN a2enmod rewrite

# Set document root to Laravel public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project
COPY . .

# Laravel env
COPY .env.example .env

# Copy frontend build
COPY --from=frontend /app/public/build ./public/build

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader -vvv

# Laravel setup
RUN php artisan key:generate && \
    php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# Permissions
RUN chmod -R 777 storage bootstrap/cache

# Expose port (important)
EXPOSE 80

CMD ["apache2-foreground"]