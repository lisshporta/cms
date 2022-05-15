#!/bin/bash

cat <<EOF
             _ _
 __   _____ | | |_
 \ \ / / _ \| | __|
  \ V / (_) | | |_
   \_/ \___/|_|\__|

Manage your vehicle inventory, boost your revenue.
[+] Setting up dependencies in progress....
EOF

docker-compose exec app composer install --ignore-platform-reqs --no-interaction --prefer-dist --optimize-autoloader

docker-compose exec app php artisan storage:link || true
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan jwt:secret
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed --class=DatabaseSeeder --force

echo -e "\n[+] Doing a health check"
docker-compose exec app php artisan health:check

echo "[+] Starting supervisord and Laravel Horizon"
docker-compose exec app /usr/bin/supervisord

echo "[+] Setup Complete"
