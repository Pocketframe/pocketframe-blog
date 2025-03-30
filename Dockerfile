# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set a global ServerName to avoid warnings
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy project files to Apache root directory
COPY . /var/www/html/

# Set the correct permissions for the Apache directory
RUN chown -R www-data:www-data /var/www/html/

# Expose port 80
EXPOSE 80