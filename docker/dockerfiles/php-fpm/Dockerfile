FROM php:8.2-fpm-alpine AS base

# Install required extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apk add --no-cache zip libzip-dev

RUN docker-php-ext-install zip

FROM base AS develop

# Add Pear/Pecl for library installation
RUN apk update && apk add --no-cache -q --virtual .phpize-deps-configure $PHPIZE_DEPS && \
    # Install pcov for code coverage
    pecl channel-update pecl.php.net && pecl install pcov && docker-php-ext-enable pcov && \
    # Remove Pear/Pecl for library installation
    apk del --no-network .phpize-deps-configure

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

FROM base AS prod

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Change current user to www
USER www-data
