FROM php:7.1-fpm

ARG uid=1000

RUN usermod -u $uid www-data

RUN apt-get update && \
    apt-get upgrade -y

RUN apt-get install -y --force-yes curl git nano zlib1g-dev libcurl4-gnutls-dev \
    && docker-php-ext-install zip pdo pdo_mysql mbstring curl \
    && docker-php-ext-enable zip

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    printf "\nPATH=\"~/.composer/vendor/bin:\$PATH\"\n" | tee -a ~/.bashrc

# composer plugin for parallel install
RUN composer global require "hirak/prestissimo"