#!/bin/sh
composer update
php artisan key:generate
php artisan config:clear
php artisan migrate:refresh
php artisan passport:install
if [ -f .env ] 
then
  echo 'Started creating etl tables...' 
  export $(cat .env | sed 's/#.*//g' | xargs)
  mysql -h $DB_HOST -P $DB_PORT  -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE < $ETL_INIT_FILE 2>/dev/null
  echo 'Finished creating etl tables.'
fi