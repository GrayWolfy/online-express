# Laravel-based URL shortener
This is a Laravel-based application that allows you to shorten URLs and redirect them to the original URL when accessed.

## Features
* API interface for generating short links and retrieving the original link from a short one
* Accepts long URLs as a request body, such as http://domain/any/path/etc;
* Returns a unique short URL address in the format http://yourdomain/abCdE (external interfaces such as goo.gl should not be used);
* When a user opens a short link in a locally running project, it should redirect to the original full address.
* Data caching implementation
* Logging of all requests and responses to a file

## Usage
To use this application, clone the repository and run the following commands in the terminal:

```
git clone https://github.com/GrayWolfy/online-express.git
```
### At the root of the project
```
cp .env.example .env

docker-compose build

docker-compose up -d

docker exec -it php-fpm bash

cd astonishing/

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate
```
### Create a user using Tinker

```
php artisan tinker

// Создание пользователя в базе 
$user = new App\Models\User;
$user->name = 'John Doe';
$user->email = 'johndoe@example.com';
$user->password = Hash::make('password');
$user->save();
 
// Получение токена для API
$token = $user->createToken('My Token')->plainTextToken;

```

## Database table schema for "urls"
| Column Name | Data Type              | Constraints                |
|-------------|-----------------------|----------------------------|
| id          | bigint unsigned       | primary key, auto_increment|
| long_url    | varchar(255) not null |                            |
| code        | varchar(255) not null |                            |
| created_at  | timestamp null        |                            |
| updated_at  | timestamp null        |                            |


## Postman Specification
In the project root directory, there is a file called postman.spec.yaml.

## Core files
``` 
app/astonishing/app/Services

app/astonishing/app/Factories

app/astonishing/app/Helpers

app/astonishing/app/Http/Middleware/LogRequestsAndResponses.php

app/astonishing/app/Http/Middleware/ResolveUrlCode.php

app/astonishing/app/Http/Controllers/UrlController.php

app/astonishing/app/Models/Url.php

app/astonishing/app/Validators/UrlValidator

app/astonishing/app/Services/CacheAdapter

app/astonishing/app/Repositories/Url

app/astonishing/app/Helpers/ObjectCloner.php
```



