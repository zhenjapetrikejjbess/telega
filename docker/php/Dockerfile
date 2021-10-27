FROM php:8.0-fpm

RUN apt-get update && apt-get install -y libzip-dev

RUN docker-php-ext-install pdo pdo_mysql zip

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer