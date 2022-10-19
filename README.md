<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Getting Started



- [Install php verion 8.0 or later](https://www.php.net/downloads.php).
- [Install MySQL](https://dev.mysql.com/downloads/).
- [Install git](https://git-scm.com/downloads).
- [Install Composer](https://getcomposer.org/download/).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Running the project

### Clone from github
- Navigate to desired folder and clone using this command
```
git clone https://github.com/chess254/stock2shop-task.git && cd stock2shop-task
```
<!-- - then
```
cd ./stock2shop
``` -->
- to install the required packages run 
```
composer update
composer install
```
- create .env file from .env.example.env
```
cp .env.example .env    //for mac and linux
copy .env.example .env  //for windows
```
- [create a new MySQL database](https://www.mysqltutorial.org/mysql-create-database/) that will be used to persist the data be sure to note the database name, username and password.
- modify the newly created .env file specifying the correct values for the following fields
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR LOCAL DATABASE NAME GOES HERE
DB_USERNAME=YOUR MYSQL DATABASE USERNAME GOES HERE
DB_PASSWORD=THE DATABASE PASSWORD FOR THE USER SPECIFIED ABOVE
```
- generate App key
```
php artisan key:generate
```
- run the migrations (either)
```
php artisan migrate //will set up empty products table
```
alternatively you can run the migrations with sample seed data
```
php artisan migrate:fresh --seed
```
- start the server
```
php artisan serve
```
- you should see...
```
$ php artisan serve
   INFO  Server running on [http://127.0.0.1:8000].

  Press Ctrl+C to stop the server
```

## Testing the api endpoints

-You can use [postman](https://www.postman.com/downloads/) or [insomnia](https://insomnia.rest/download) to test the following endpoints.

| HTTP VERB      | Path                           | 
| -------------- | ------------------------------ | 
| POST           | localhost:8000/api/products    |

- Request
```    
    { 
            "sku": "z9DQb22xruyi1oJiEJjX",
            "attributes": {
                "a": "Alpha",
                "b": "Bravo",
                "c": "Charlie"
            }
    }
```    
- response HTTP status: 200 OK
```    
    { 
            "sku": "z9DQb22xruyi1oJiEJjX",
            "attributes": {
                "a": "Alpha",
                "b": "Bravo",
                "c": "Charlie"
            }
    }
```   

- This is the response when a product is posted with sku value that violates the unique constraint (i.e an sku value that already exists in the database)
- - response HTTP status: 400 BAD REQUEST
```    
    {
        "sku": [
            "The sku has already been taken."
        ]
    }
``` 


| HTTP VERB      | Path                           | 
| -------------- | ------------------------------ | 
| GET            | localhost:8000/api/products    |

- response HTTP status: 200 OK
```    
    {
    "current_page": 1,
    "data": [
        {
            "sku": "b7wuQOjmcXdGKJQ2XLWb",
            "attributes": {
                "1": "One",
                "2": "Two",
                "3": "Three"
            }
        },
        {
            "sku": "RZhJgBx6BpQ0LYAi2gXM",
            "attributes": {
                "testA": "Alpha",
                "Btest": "Bravo",
                "TESTC": "Charlie"
            }
        }
    ],
    "first_page_url": "http://localhost:8000/api/products?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/products?page=1",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://localhost:8000/api/products?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "http://localhost:8000/api/products",
    "per_page": 10,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}
```    
Note: for getting a list of products, the required data is found in the "data" property of the response object. 
Pagination is included when getting the list of products to help chunk the list into small sizes as the list grows. This can improve performance. 
There is also metadata and links for loading previous page (if there are multiple), loading first, last, current and next page and also total number of products in the database.



Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
