#!/bin/sh

cd /app

until nc -z db 3306; do
  echo "Aguardando o serviço db ficar disponível..."
  sleep 1
done

php artisan key:generate
php artisan migrate
php artisan serve --host=0.0.0.0
