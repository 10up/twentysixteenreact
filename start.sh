#!/bin/bash

echo "Installing WordPress"
if [ ! -f /var/www/html/index.php ]; then
  tar xvzf /tmp/latest.tar.gz -C /var/www/html --strip-components=1
  chown -R apache:apache /var/www/
  chmod -R 0775 /var/www
fi

echo "Starting nginx..."
nginx

echo "Starting php..."
php-fpm --nodaemonize
