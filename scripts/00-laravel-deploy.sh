#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Gerando migrações"
php artisan cache:table

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache
