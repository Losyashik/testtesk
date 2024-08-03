npm i 
composer install
copy ./.env.example ./.env
php artisan migrate
php artisan key:generate 