# Base stage
FROM nginx:1.20-alpine AS base

# Set UID and GID as build arguments
ARG UID
ARG GID
ENV UID=${UID} GID=${GID}

# Create laravel user and group
RUN addgroup -g ${GID} --system laravel \
    && adduser -G laravel --system -D -s /bin/sh -u ${UID} laravel

# Update nginx configuration to use laravel user
RUN sed -i "s/user  nginx/user laravel/g" /etc/nginx/nginx.conf

# Create directory for web content and set permissions
RUN mkdir -p /var/www/html \
    && chown -R laravel:laravel /var/www/html

# Copy entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Development stage
FROM base AS development

# Copy development Nginx configuration file
COPY ./rootfs/etc/nginx/default.dev.conf /etc/nginx/conf.d/default.conf

# Expose port 80 for the application
EXPOSE 80

# Entrypoint script to start Nginx
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Production stage
FROM base AS production

# Copy production Nginx configuration file
COPY ./rootfs/etc/nginx/default.prod.conf /etc/nginx/conf.d/default.conf

# Expose port 80 for the application
EXPOSE 80

# Entrypoint script to start Nginx
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
