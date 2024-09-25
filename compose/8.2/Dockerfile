# Base stage for common dependencies
FROM php:8.2-fpm-alpine AS base

ARG UID
ARG GID
ENV UID=${UID} GID=${GID}

WORKDIR /var/www/html

RUN apk --no-cache add \
    build-base \
    curl \
    freetype \
    freetype-dev \
    git \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    libpng \
    libpng-dev \
    libzip \
    libzip-dev \
    icu \
    icu-dev \
    oniguruma \
    oniguruma-dev \
    openssl-dev \
    unzip \
    zip

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    exif \
    gd \
    intl \
    mbstring \
    pcntl \
    zip

# Install MongoDB extension
RUN apk --no-cache add \
    autoconf \
    linux-headers \
    && pecl install mongodb && docker-php-ext-enable mongodb

# Install MySQL extension
RUN docker-php-ext-install pdo_mysql

# Install SQLite extension
RUN apk --no-cache add \
    sqlite \
    sqlite-dev \
    && docker-php-ext-install pdo_sqlite

# Install PostgreSQL extension
RUN apk --no-cache add \
    postgresql-dev \
    && docker-php-ext-install pdo_pgsql pgsql

# Remove build dependencies
RUN apk del --no-cache \
    autoconf \
    freetype-dev \
    icu-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    linux-headers \
    oniguruma-dev \
    openssl-dev

# Development stage
FROM base AS development

# Install Xdebug and other development tools
RUN apk --no-cache add \
    autoconf \
    linux-headers \
    && pecl install xdebug && docker-php-ext-enable xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add laravel user and group
RUN addgroup -g ${GID} laravel && adduser -u ${UID} -G laravel -s /bin/bash -D laravel

# Change ownership
RUN chown -R laravel:laravel /var/www/html

# Copy application source
COPY --chown=laravel:laravel . /var/www/html

# Copy development PHP configuration file
COPY ./rootfs/etc/php82/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Copy general PHP configuration file
COPY ./rootfs/etc/php82/dev.ini /usr/local/etc/php/conf.d/local.ini

USER laravel

EXPOSE 9000

CMD ["php-fpm"]

# Production stage
FROM base AS production

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add laravel user and group
RUN addgroup -g ${GID} laravel && adduser -u ${UID} -G laravel -s /bin/bash -D laravel

# Change ownership and create necessary directories
RUN mkdir -p /var/www/html/vendor \
    && chown -R laravel:laravel /var/www/html

# Copy application source
COPY --chown=laravel:laravel . /var/www/html

# Copy general PHP configuration file
COPY ./rootfs/etc/php82/prod.ini /usr/local/etc/php/conf.d/local.ini

USER laravel

EXPOSE 9000

CMD ["php-fpm"]

