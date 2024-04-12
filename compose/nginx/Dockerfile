# Use a specific version of nginx
FROM nginx:1.20-alpine

# Set UID and GID as environment variables
ARG UID
ARG GID
ENV UID=${UID} GID=${GID}

# Create laravel user and group
RUN addgroup -g ${GID} --system laravel \
    && adduser -G laravel --system -D -s /bin/sh -u ${UID} laravel

# Update nginx configuration to use laravel user
RUN sed -i "s/user  nginx/user laravel/g" /etc/nginx/nginx.conf

# Copy nginx configuration file
COPY rootfs/etc/nginx/default.conf /etc/nginx/conf.d/

# Create directory for web content
RUN mkdir -p /var/www/html
