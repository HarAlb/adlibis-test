FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libwebp-dev \
        libzip-dev \
        libonig-dev \
        libicu-dev \
        zip \
        unzip \
        zlib1g-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd pdo pdo_mysql zip sockets mbstring opcache intl
RUN docker-php-ext-enable intl

RUN pecl install redis && docker-php-ext-enable redis

RUN sed -i 's|^listen = .*|listen = 9000|' /usr/local/etc/php-fpm.d/www.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/adlibis-test

CMD ["php-fpm"]
