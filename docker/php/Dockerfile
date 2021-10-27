FROM php:8.0-fpm

RUN apt-get update && apt-get install -y libzip-dev

RUN docker-php-ext-install pdo pdo_mysql zip

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
# set default timezone
RUN sed -ri -e 's!;date.timezone =!date.timezone = "Europe/Kiev"!g' /usr/local/etc/php/php.ini