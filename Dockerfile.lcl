FROM php:8.4-cli-alpine

RUN apk add --no-cache \
    bash curl zip unzip \
    libpng-dev libjpeg-turbo-dev freetype-dev \
    icu-dev oniguruma-dev libxml2-dev \
    libzip-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring intl bcmath gd xml dom zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www