#!/bin/sh

cd /app
php artisan key:generate
php artisan migrate
php artisan serve --host=0.0.0.0
