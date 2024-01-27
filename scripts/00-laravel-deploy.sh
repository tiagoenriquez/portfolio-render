#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

composer require --dev "kitloong/laravel-migrations-generator"

echo "Gerando migrações"
php artisan migrate:generate

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

php artisan key:generate --show

ls
