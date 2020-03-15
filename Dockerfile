FROM php:7.4.1-apache

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo_pgsql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY docker /usr/local/etc/php/conf.d/xdebug.ini