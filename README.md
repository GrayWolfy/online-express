# Laravel-based URL shortener
This is a Laravel-based application that allows you to shorten URLs and redirect them to the original URL when accessed.

## Features
API interface for generating short links and retrieving the original link from a short one
Accepts long URLs as a request body, such as http://domain/any/path/etc;
Returns a unique short URL address in the format http://yourdomain/abCdE (external interfaces such as goo.gl should not be used);
When a user opens a short link in a locally running project, it should redirect to the original full address.
Data caching implementation
Logging of all requests and responses to a file
## Usage
To use this application, clone the repository and run the following commands in the terminal:

```
git clone https://github.com/GrayWolfy/online-express.git
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```
### В корне проекта
```
docker-compose build

docker-compose up

docker exec -it php-fpm bash

cd astonishing/

composer install

php artisan key:generate
```
### Создаем пользователя тинкером

```
php artisan tinker

// Создание пользователя в базе 
$user = new App\Models\User;
$user->name = 'John Doe';
$user->email = 'johndoe@example.com';
$user->password = Hash::make('password');
$user->save();
 
// Получение токена для базы
$token = $user->createToken('My Token');

$accessToken = $token->accessToken;
```

## Спека для Postman
В корне проекта файл postman.spec.yaml



