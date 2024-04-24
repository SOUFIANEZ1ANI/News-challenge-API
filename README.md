## NEWs challenge - API

## Implemented endpoints
* [x] A user can login.
* [x] A user can see paginated news sorted by start date.
* [x] An authenticated user can create a news
* [x] An authenticated user can update a news
* [x] An authenticated user can remove a specific news
* [x] An authenticated user can see details of a specific news.
* [x] An authenticated user can search news by category name.

## Unit/Feature testing
![](.docs/tests.png)

## Used technologies

- PHP 8.1
- Laravel
- Sanctum (for authentication)
- IDE: PHPStorm

## Installation Steps

> prerequisite: PHP >= 8.1

* Clone repository
* `composer install`
* Create DB eg: `news_challenge_api`
* `composer setup` (copies `env` file, generates key, and migrates DB and execute the seeders)
* Then run ``` php artisan serve ```

## Testing
In this file [doc/postman_collection.json](.doc/postman_collection.json) you will find the postman collection which you can import into your local postman app and test the api.




