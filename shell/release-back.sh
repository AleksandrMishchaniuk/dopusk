#!/bin/sh

composer install
php artisan migrate --force