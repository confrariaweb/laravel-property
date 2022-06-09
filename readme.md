# Package Real Estate Laravel  

property package for laravel

## Installation  
```php 
composer create-project laravel/laravel confraria-imob
composer require confrariaweb/laravel-property

#Laravel Breeze
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
php artisan migrate
```

## Configurations
Configure database information in .env file

Run the command to import the necessary configuration files:
```php
php artisan vendor:publish --force
```












Edit the ".env" file and include the application's Dashboard Template configuration:
```php
CW_DASHBOARD_LAYOUT="templateDashboardArgon::layouts.app"  
CW_DASHBOARD_VIEWS="templateDashboardArgon::"
```

## License  

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).