#!/bin/sh

set -e

# Nếu file .env không tồn tại, tạo từ file .env.example
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Chạy các lệnh artisan nếu cần
php artisan key:generate --ansi
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec "$@"
