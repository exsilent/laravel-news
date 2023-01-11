#!/bin/sh
set -e

if [ ! -f .env ]; then
  echo "create .env file"
  cp .env.example .env
fi

if [ ! -d "vendor" ]; then
  echo "composer install"
  composer install

  while ! nc -z news-mysql 3306; do
    echo "Waiting for MySQL ready..."
    sleep 3
  done

  echo "db migration"
  php artisan migrate

  echo "db seeding"
  php artisan db:seed
fi

exec "$@"
