#!/bin/sh

cd /app

until nc -z $DB_HOST 3306; do
  echo "Aguardando o serviço de banco de dados ficar disponível..."
  sleep 1
done

php artisan key:generate
php artisan migrate
php artisan serve
