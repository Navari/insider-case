cp .env.example .env;
# composer install
composer install
# migrate and seed
php artisan migrate
# run npm run dev
npm run dev
echo "Install Done!"
