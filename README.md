# How to install

```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run dev
php artisan serve

---------------------------------------

Admin:
Um den Admin zu erreichen ist es wichtig, einen Account vorher zu registrieren.
Dies kann nur getan werden wenn man diese versteckte Route aufruft:
http://127.0.0.1:8000/admin/register

Nach der Registrierung ist man direkt im Admin eingelogt.

Tests durchführen:
$php artisan dusk
$vendor/bin/phpunit

---------------------------------------

Optional:

php artisan route:clear
php artisan cache:clear

```


