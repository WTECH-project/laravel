# Semester project - eshop

## Assignment
Create a web application - eshop, which comprehensively solves the use cases defined below in your chosen domain (e.g. electronics, clothing, footwear, furniture).

## Application - eshop

**The application must implement the following use cases:**

**Client part**
* displaying an overview of all products from the selected category by the user
* basic filtering (at least according to 3 attributes, e.g. price range from-to, brand, color)
* pagination
* rearrangement of products (e.g. according to price ascending/descending)
* display of a specific product - product detail
* adding a product to the cart (any quantity)
* full-text search over the product catalog
* shopping cart display
* quantity change for the given product
* removal of the product
* enter delivery option
* payment selection
* entering delivery data
* order completion
* enabling purchase without logging in
* portability of the shopping cart in the case of a logged-in user
* user/customer registration
* user/customer login
* customer logout

**Administrative section**
* administrator can login to the e-shop administrator interface
* logout of the administrator from the administrator interface
* creation of a new product by the administrator via the administrator interface
* modification/deletion of the existing product by the administrator via the administrator interface

## Technologies
* Framework - [Laravel](https://laravel.com/)
* CSS Framework - [TailwindCSS](https://tailwindcss.com/)
* Database - PostgreSQL

## Getting Started
1. Clone this repository:
```
https://github.com/WTECH-project/laravel.git
```

2. Configure ./env or rename .env.example to .env

3. Build docker images:
```
docker-compose up
```

4. Run migrations and seeders:
```
docker exec wtech_app php artisan storage:link
docker exec wtech_app php artisan migrate:fresh
docker exec wtech_app php artisan db:seed
```

5. Open [localhost](http://localhost:8000)