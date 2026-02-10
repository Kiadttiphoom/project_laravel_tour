FROM richarvey/nginx-php-fpm:8.2

COPY . /var/www/html

ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate
RUN php artisan config:clear

EXPOSE 8080
