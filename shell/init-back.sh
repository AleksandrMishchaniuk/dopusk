#!/bin/sh

composer install
php ./artisan key:generate
php ./artisan migrate --force
php ./artisan db:seed --force