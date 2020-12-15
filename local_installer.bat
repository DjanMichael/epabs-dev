
start /wait /b cmd /c "php artisan optimize && php artisan migrate:fresh --drop-views --seed && php artisan passport:install --force && echo -= STARTING ARTISAN WEBSOCKET SERVER =- && php artisan websockets:serve"
start cmd /k "php artisan config:clear && php artisan view:clear && php artisan queue:restart && echo -= STARTING LISTENNING TO QUEUABLE JOBS =- && php artisan queue:listen --timeout=0"

