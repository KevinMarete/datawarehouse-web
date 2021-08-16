#!/bin/sh
php artisan passport:install --force
php artisan migrate
php-fpm