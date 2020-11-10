# Flexible Coupon System

## Requirement
Your server must meet the following requirements as found in laravel documentation

* PHP >= 7.3
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

In addition to these, you must also have composer installed on your system and must be global

## Steps
The following steps are to be taken to successfully installed and 

1. Download the app on to your system / server

2. In the application directory, you  create .env file and copy the content in .env.example into the .env file created.

3.  In the newly created .env file, replace the value of DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME and DB_PASSWORD to your database credentials (if the db reside on the same machine, use localhost or 127.0.0.1 else use the IP of the machine your database is hosted as DB_HOST value. For DB_PORT, by default mysql port is 3306. DB_USERNAME and DB_PASSWORD are your database username and password).if you are using Mysql, you leave DB_CONNECTION as mysql else change it to your database. You can also change APP_NAME in the env to any name you want. If you are running it in production , remember to set APP_DEBUG value to false

4. Go to your commandline, navigate to the application directory and run the following command

    * composer update (This download the dependencies / packages required for this applicatio )

    * php artisan key:generate  (To generate app key value for the application).

    * php artisan migrate (To generate the tables needed for this application).

    * composer dump-autoload (To regenerate Composer's autoloader. This is required for seeding as found in laravel documentions under seeding)

    * php artisan db:seed (To generate data for our tables, we made some data available. Although in real world, the data should be entered dynamically through admin section. The admin can enter different coupon, criteria for the coupon and discount either as fixed or percent. This application pick the coupon generated from database and the rules set in the database)

    * php artisan serve (to run the application, you can then copy and paste the development server url in to the browser. In most cases its always http://127.0.0.1:8000)

Note : instead of php artisan serve, you can create a virtual host and point to the public path of the application. the index.php is in the public directory of the application


## About this project

This project is aim to show how to dynamically add coupon to ecommerce site. It can be added to any ecommerce site. 