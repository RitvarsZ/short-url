# ShortURL
*A Laravel URL shortener*

## Requirements
1. https://docs.docker.com/get-started/

## Setup
1. Clone the repository
2. Make sure docker is running
3. Run `./vendor/bin/sail up` to run the containers
4. Migrate the database with `./vendor/bin/sail php artisan migrate`
6. Run `./vendor/bin/sail npm i` to install npm dependencies

## Running tests
Run tests with `./vendor/bin/sail test`