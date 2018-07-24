FROM php:7.2.8-fpm

RUN apt update && apt install -y libmcrypt-dev \
  mysql-client libmagickwand-dev --no-install-recommends \
  && pecl install imagick \
  && docker-php-ext-enable imagick \
  && docker-php-ext-install pdo_mysql