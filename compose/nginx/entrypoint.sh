#!/bin/sh

# Print the Nginx version
nginx -v

# Start Nginx in foreground
exec nginx -g 'daemon off;'
