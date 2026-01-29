#!/bin/bash

# Ensure SQLite database exists
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
fi

# Ensure .env exists
if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate
fi

# Fix permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/database

# Composer
if [ ! -d "vendor" ]; then
    composer install
fi

# Node
if [ ! -d "node_modules" ]; then
    npm install
fi

# 👉 ESSENCIAL
echo "Building Vite assets..."
npm run build

php artisan migrate --force

exec php-fpm
