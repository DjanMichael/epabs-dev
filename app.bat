
start cmd /k "php artisan websockets:serve"
start cmd /k "php artisan queue:restart && echo -= STARTING LISTENNING TO QUEUABLE JOBS =- && php artisan queue:listen --timeout=0"

