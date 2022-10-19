#!/bin/sh
# This script is used to deploy the application to the server

git pull

composer install
npm install
npm run build
php artisan route:cache
php artisan config:cache
php artisan view:cache

chown -R www-data:www-data /srv/fablab-name
