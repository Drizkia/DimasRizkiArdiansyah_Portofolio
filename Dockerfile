FROM php:8.2-fpm

WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev \
    libzip-dev zip unzip default-mysql-client

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions untuk MySQL
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Optimisasi Laravel
# RUN php artisan config:cache && \
#     php artisan route:cache && \
#     php artisan view:cache
RUN php artisan config:clear && \
    php artisan cache:clear

# Set permissions
RUN chmod -R 775 storage bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8080

# Start server
# CMD php artisan serve --host=0.0.0.0 --port=$PORT
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
