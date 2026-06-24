# sallahport

SalahPort — airport prayer rooms, wudu facilities, prayer times, and Muslim traveler guides.

## Stack

- Laravel 12
- PHP 8.2
- Tailwind CSS v4
- MySQL

## Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run build
```

## Admin

- URL: `/admin/login`
- Default seeder: `admin@salahport.com` / `password`
