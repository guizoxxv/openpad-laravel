FROM php:7.1.6-fpm

RUN apt-get update

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Required for php zip extension
RUN apt-get install -y zlib1g-dev

# Required php extensions for Laravel
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_mysql
