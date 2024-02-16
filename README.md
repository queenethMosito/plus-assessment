<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Plus Assessment Setup Instructions
To set up the Plus Assessment project on your local, follow these steps:

1. git clone https://github.com/queenethMosito/plus-assessment.git
2. Run the following:
 - composer install
 - php artisan migrate  
 - php artisan db:seed --class=RolesTableSeeder
 - php artisan db:seed --class=PermissionsTableSeeder
 - php artisan db:seed --class=PermissionRoleSeeder
 - php artisan db:seed --class=UsersTableSeeder
 - npm install && npm run dev
 - php artisan serve --port=5173
Please refer to UsersTableSeeder for admin logins
