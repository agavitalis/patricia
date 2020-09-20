# Patricia Auth Service

A Simple Auth and User Service for Patricia Inc. This application utilizes ome best praticies like repositiores and interfaces to maintain modularity.

## Idea Concept
Authentication service with:
 1. Registration
 2. Login 
 3. Token generation for subsequent actions 
 4. Fetch user's data. 

## Documentation
* This API Live documentation can be found here: [Click here to see API Documentation](https://documenter.getpostman.com/view/9706823/T1LLG8bS)

* You can also import the documetation file `documentation.json` at the root directory to your postman to have access to the endpoints locally.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites 
Enure you have the following installed and running on your system:
 1. PHP 7.2 and Above
 2. Composer 
 3. MySql Database System 
 
### Project Setop 
Clone this project to your PC, Then from the terminal, navigate to the root of this project, then run

```
composer install

```
to install required project dependencies.

### Credentials
This application requires a secret to work well, on your project directory:
* Create an .env file
* Copy and paste the contents of .env.example file to the .env file you just created
* Update the database credentials to your suit

### Generate JWT Secret
Run the command below on the terminal to generate JWT Secret:
```
php artisan jwt:secret

```

### Running the project
To start the API server, on the terminal run the command

```
php -S localhost:8000 -t public

```
### Running Migrations

Use the command below to migrate the models to the database already setup

```
php artisan migrate
```

### Seeding of Test Data
This applications uses faker to generate dummy test data. Use the command below to generate test data

```
php artisan db:seed
```

### Running unit tests

To run Unit Tests using PHPUnit, run the following command on the terminal

```
vendor/bin/phpunit
```

### Running unit tests in debug

Unit tests can be run in debug mode by running the following commad on the terminal

```
vendor/bin/phpunit --debug
```

A code coverage report will be seen on your console.


### Refreshing the database
Refresh the database of this application after running unit tests or after testing the application with dummy data by using the following command on the terminal

```
php artisan migrate:fresh
```

## Built With
* [Lumen](https://lumen.laravel.com/) - The stunningly fast micro-framework by Laravel.
* [JWT](https://jwt-auth.readthedocs.io/en/develop/lumen-installation/) - Token generation and verification.

## Licence
* [MIT](https://opensource.org/licenses/MIT) - Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions...[Read more](https://opensource.org/licenses/MIT)

## Contributor
* [agavitalis](https://agavitalis.herokuapp.com/) - A Software Engineer, Tutor and a Learner.
