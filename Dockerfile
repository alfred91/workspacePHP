FROM php:latest

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    libpng-dev \
    libfreetype6-dev\
    libjpeg62-turbo-dev \
    unzip \
    && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer require tecnickcom/tcpdf

WORKDIR /var/www/html