FROM php:8.0.6-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y git libzip-dev zip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD .docker/php/infra/extensions/xdebug.sh /root/install-xdebug.sh
RUN sh /root/install-xdebug.sh
COPY .docker/php/infra/conf.d /usr/local/etc/php/conf.d/

# Set working directory
WORKDIR /var/www