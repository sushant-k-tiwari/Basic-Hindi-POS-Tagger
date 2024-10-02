# Use the official PHP 8.3 image with Apache
FROM php:8.3-apache

# Copy your PHP files to the Apache document root
COPY . /var/www/html/

# Expose port 80 to the Render platform
EXPOSE 80

# Start the Apache server in the foreground
CMD ["apache2-foreground"]
