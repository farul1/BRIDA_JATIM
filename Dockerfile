# Gunakan PHP 8.2 dengan FPM
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install dependency sistem
RUN apk add --no-cache \
    bash \
    git \
    libzip-dev \
    unzip \
    curl \
    oniguruma-dev \
    icu-dev \
    postgresql-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    zip

# Install ekstensi PHP yang dibutuhkan Laravel
RUN docker-php-ext-install pdo_mysql pdo_pgsql zip intl mbstring exif pcntl gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy seluruh project ke container
COPY . .

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permission storage & bootstrap cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port PHP-FPM
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]
