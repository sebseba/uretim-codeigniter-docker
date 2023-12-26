FROM php:8.1-apache

RUN apt-get update \
    && apt-get install -y libicu-dev \
    && docker-php-ext-install intl \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo pdo_mysql \

    && a2enmod rewrite

    