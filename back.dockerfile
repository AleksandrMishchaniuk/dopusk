FROM machorgua/php-fpm-prod:1.0.0

COPY composer.lock composer.json /var/www/

COPY database /var/www/database

WORKDIR /var/www

RUN composer install --no-dev --no-scripts

COPY . /var/www

RUN chown -R www-data:www-data \
        /var/www/storage \
        /var/www/bootstrap/cache

RUN php artisan optimize