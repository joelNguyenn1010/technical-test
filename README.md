## Installation
### Require
* PHP 7.2+
* MySQL Database
* Node
### Install
- Install all dependencies
```
composer install
```
```
npm install
```

* Create .env file
- Generate APP_KEY
```
php artisan key:generate
```

and open your .env and put your database info in there
* Example
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=
```
* Run seed (optional)
> **Note:** In this application, I have also make two functions to create new role and user
```
php artisan db:seed
```
