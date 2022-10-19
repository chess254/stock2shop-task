<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://media-exp1.licdn.com/dms/image/C4D0BAQGOa5w5GtnxEg/company-logo_200_200/0/1534318845106?e=2159024400&v=beta&t=UtbuxZIujX2gmtCfwqac8bA1NmQZxq7L6q3byh6Dfr8" width="200" alt="s2s Logo"></a></p>

# Stock2Shop-Task

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
php artisan migrate:fresh //will set up empty products table
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

- You can use [postman](https://www.postman.com/downloads/) or [insomnia](https://insomnia.rest/download) to test the following endpoints.
- Note: There is a file in the root folder of this project named stock2shopTest.postman_collection.json, you can import this collection to postman to get the endpoints and payloads faster. 

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
Note: the number of "key":"value" pairs under attributes is variable, also, they can contain any string.

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

- The following is the response when a product is posted with sku value that violates the unique constraint (i.e an sku value that already exists in the database)
- response HTTP status: 400 BAD REQUEST
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
#### Note
- When getting a list of products, the required data is found in the "data" property of the response object. 
- Pagination is included when getting the list of products to help chunk the list into small sizes as the list grows. This can improve performance. 
- There is also metadata and links for loading previous page (if there are multiple), loading first, last, current and next page and also total number of products in the database.

## Rationale

- I chose to store the attributes field in a mysql JSON datatype (and use casting when fetching) as compared to using relationships or Json string (this was used in earlier versions of mysql).
The reason I did not use one to many relationship is because the number of key-values pairs under attributes field are variable for different products.
- I used the default laravel pagination when listing products to help in performance as the list of products grows.
- Id and timestamps are in the database, but do not get displayed when listing products.
- SKU field is validated when POSTing a product to make sure its unique, if not unique a custom json error message is returned (not the default html stack trace).
- I chose to use Laravel framework because i prefer convention over configuration: Laravel has well defined conventions for handling common use cases, it has very good documentation and a vibrant community that maintains it. It is also open source.

### Further considerations
-Route and configuration caching can help improve performance as the application grows.
-Eager loading can also be used as the models aquire complex relationships (as compared to lazy loading) to improve performance by avoiding the N+1 problem.
-As the application grows, Events and Queues can be used for tasks that need time to run, so that they can be done asynchronously and the user is provided immediate feedback then updated when the long running task is done( for example compressing images before storage ).
