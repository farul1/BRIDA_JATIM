FROM php:8.2-apache

WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl

RUN docker-php-ext-install pdo_mysql zip

# Copy project
COPY . .

# Enable apache rewrite
RUN a2enmod rewrite

# Expose port
EXPOSE 8080
CMD ["apache2-foreground"]
