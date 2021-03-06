<p align="center">
<img src="https://vignette.wikia.nocookie.net/wowwiki/images/8/8b/The_Gilded_Rose.jpg/revision/latest?cb=20071222074445"
 width="100%"></p>

## About Gilded-Rose refactoring kata API

The original code from [Gilden-Rose refactoring kata](https://github.com/emilybache/GildedRose-Refactoring-Kata) was implemented in fresh laravel project, then
refactored and covered with tests. 

Additionally, 2 API endpoints were created in order to review all items and a specific item.

Also, in order to make code even more readable, I refactured everything to use PSR-12 coding standarts

## Installation

Clone repository

```
git clone https://github.com/Saltibarsciai/gilded-rose-laravel-api.git
```

Navigate to it

```
cd gilded-rose-laravel-api
```

Create .env file

```
cp .env.example .env
```

Generate key

```
php artisan key:generate
```

create database.sqlite (Windows)

```
echo database/database.sqlite
```

create database.sqlite (UNIX)

```
touch database/database.sqlite
```

Install php dependencies

```
composer install
```


Migrate database and seed with random Gilded-Rose shop items

```
php artisan migrate --seed
```

Launch

```
php artisan serve
```

## Endpoints

Returns json of items:

http://localhost:8000/api/v1/items

Returns specific item

http://localhost:8000/api/v1/items/1/

## Tests

If you use UNIX
```
vendor/bin/phpunit
```
If you use windows
```
vendor\bin\phpunit
```
23 tests are written and 45 assertions are executed to make sure refactored code works fine

