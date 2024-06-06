# Use the official PHP image with Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files to the working directory
COPY . /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install project dependencies
RUN composer install

# Copy Apache configuration file
COPY ./apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80

EXPOSE 80
RUN chmod -R 0777 /var/www/html/writable


# Start Apache server
CMD ["apache2-foreground"]

# Copy Apache configuration file
COPY ./apache/vhost.conf /etc/apache2/sites-available/000-default.conf

