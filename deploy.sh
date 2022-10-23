#!/bin/sh
# This script is used to deploy the application to the server

git pull

php artisan migrate

composer install
npm install
npm run build

php artisan config:cache
php artisan view:cache
php artisan route:cache
php artisan optimize

chown -R www-data:www-data /srv/fablab-name
