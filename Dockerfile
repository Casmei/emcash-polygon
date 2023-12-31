FROM php:8.1-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql sockets

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer install
COPY --chmod=700 ./entrypoint.sh /tmp

ENTRYPOINT ["/tmp/entrypoint.sh"]
