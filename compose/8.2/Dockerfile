# Use PHP 8.2 FPM Alpine base image
FROM php:8.2-fpm-alpine

# Set UID and GID as environment variables
ARG UID
ARG GID
ENV UID=${UID} GID=${GID}

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apk --no-cache add \
    build-base \
    libpng \
    libpng-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    freetype \
    freetype-dev \
    libzip \
    libzip-dev \
    icu \
    icu-dev \
    oniguruma \
    oniguruma-dev \
    openssl-dev \
    zip \
    unzip \
    git \
    curl \
    vim \
    autoconf \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    gd \
    pdo_mysql \
    mbstring \
    zip \
    exif \
    pcntl \
    intl \
    && apk del --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    openssl-dev

# Install MongoDB PHP extension
RUN apk --no-cache add \
    autoconf \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && apk del --no-cache autoconf

# Install Redis dependencies
RUN apk --no-cache add \
    autoconf \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del --no-cache autoconf

# Install Xdebug dependencies
RUN apk --no-cache add \
    autoconf \
    linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del --no-cache autoconf

# Copy Xdebug configuration
COPY ./rootfs/etc/php82/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add laravel user and group
RUN addgroup -g ${GID} laravel && adduser -u ${UID} -G laravel -s /bin/bash -D laravel

# Change ownership
RUN chown -R laravel:laravel /var/www

# Copy php configuration file
COPY ./rootfs/etc/php82/local.ini /usr/local/etc/php/conf.d/local.ini

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
