# Mireli: Setup Guide

Follow these steps once on each machine. Everyone ends up with the same database and the same demo accounts.

## 1. Requirements
- XAMPP (for MySQL), PHP 8.3 or newer, Composer, Node.js 22 or newer, Git
- In XAMPP's `php.ini`, make sure `extension=pdo_mysql` is enabled (remove the `;` in front of it)

## 2. Get the code
```
git clone <your repository url>
cd Mireli-real-estate-system
```

## 3. Create the database
1. Open the XAMPP control panel and start **MySQL**.
2. Open phpMyAdmin (http://localhost/phpmyadmin).
3. Create an empty database named `mireli_db` with collation `utf8mb4_unicode_ci`.

## 4. Configure and install
```
composer install
copy .env.example .env        (on Mac or Linux: cp .env.example .env)
php artisan key:generate
php artisan migrate --seed
npm install
```
`.env` is never committed to Git (it is in `.gitignore`), so each person has their own copy. If your MySQL root user has a password, set `DB_PASSWORD` in `.env`.

## 5. Run
Open two terminals in the project folder:
```
php artisan serve
npm run dev
```
Then open http://localhost:8000. If the page looks unstyled, `npm run dev` is not running.

## 6. Demo accounts (password for all: `password`)
- Admin: admin@mireli.test
- Management: manager@mireli.test
- Clients: client1@mireli.test, client2@mireli.test, client3@mireli.test

These exist for local demos only. Never use them on a real server.

## 7. Recommended one-line change: timezone
M-PESA times and viewing slots are in Kenyan time. In `config/app.php` change
`'timezone' => 'UTC'` to `'timezone' => 'Africa/Nairobi'`.

## 8. Working as a team
- Work on a feature branch (for example `pair2/property-crud`) and open a pull request into `develop`.
- After pulling, run `composer install`, `php artisan migrate` and `npm install` if anyone changed those.
- Every database change is a **new** migration file. Never edit one that is already merged.
- Keep your screens inside your own files: `routes/properties.php` (Pair 2), `routes/viewings.php` (Pair 3), `routes/payments.php` (Pair 4). The route names there are frozen because other pairs link to them.
- Put every page in the layout: start the file with `@extends('layouts.app')` and write your page inside `@section('content')`.
- Use the shared CSS classes in `resources/css/main.css` (`.btn`, `.card`, `.table`, `.badge`, `.form-control`) so the site looks the same everywhere.

## 9. Running the tests
```
php artisan test
```
Pair 1's tests are in `tests/Feature/AuthAccessTest.php`.

## Troubleshooting
- **SQLSTATE connection refused:** MySQL is not running in XAMPP, or the port in `.env` is wrong.
- **could not find driver:** enable `pdo_mysql` in `php.ini` and restart the terminal.
- **Unknown database 'mireli':** create it in phpMyAdmin (step 3).
- **Unstyled pages:** run `npm run dev`.
- **Class "App\Models\Viewing" not found:** that model arrives with the other pairs' work; nothing in Pair 1's code calls it yet.
