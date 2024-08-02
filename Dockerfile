FROM php:7.4-cli

COPY . /var/www/html
WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_pgsql
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo_pgsql

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install
