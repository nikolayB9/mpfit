### About

A simple application that can: 
- show all products, create a product, edit a product
- create an order, view orders, edit order status

### Setup

create a file .env
```
composer install

php artisan key:generate
php artisan migrate --seed
php artisan serve
```
