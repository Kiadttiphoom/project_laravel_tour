FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev \
 && docker-php-ext-install zip \
 && a2enmod rewrite

# 👉 ตั้ง DocumentRoot ไปที่ public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# 👉 แก้ Apache config + เปิด AllowOverride
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
 && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf \
 && sed -ri 's/AllowOverride None/AllowOverride All/g' \
    /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Copy source
COPY . /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
