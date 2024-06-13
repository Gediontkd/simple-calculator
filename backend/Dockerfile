FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libmcrypt-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY . /var/www
WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000

