# Apartment API

## Introduction
Apartment API  is a Laravel powered API that allows users to add, view, update and delete apartments Users will also be able to rate, review apartments and the landlords.

![alt text](https://raw.githubusercontent.com/eniola4031/apartment-api/main/public/Screenshot.png)

## Table of Contents
1. <a href="#technology-stack">Technology Stack</a>
2. <a href="#application-features">Application Features</a>
3. <a href="#api-endpoints">API Endpoints</a>
4. <a href="#setup">Setup</a>
5. <a href="#author">Author</a>
6. <a href="#license">License</a>

## Technology Stack
  - [PHP](https://www.php.net)
  - [Composer](https://getcomposer.org)
  - [MySql](https://www.mysql.com)
  - [Laravel](https://laravel.com)
  
## Application Features
* User can signup and signin
* User can add and view products
* User can update or delete his product
* User can reviews apartments or landlords
* User can rate the apartments as helpful or not

## API Endpoints
Method | Route | Description
--- | --- | ---
`POST` | `/api/register` | Create a user
`POST` | `/api/login` | Login an already registered user
`GET` | `/api/user/apartments` | View all apartments
`GET` | `/api/apartments/:id` | View a single property
`POST` | `/api/apartments/:apartmentId/reviews` | Create a review for an apartment

## Setup
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

  ### Dependencies
  - [PHP](https://www.php.net)
  - [Composer](https://getcomposer.org)
  - [MySql](https://www.mysql.com)
  - [Laravel](https://laravel.com)
 
  ### Getting Started
    ```
    $ git clone https://github.com/Eniola4031/apartment-api.git
    $ cd apartment-api
    $ composer install
    ```
  - Duplicate and save .env.example as .env and fill in environment variables
    ```
    $ php artisan migrate
    ```
  ### Run The Service
  ```
  $ php artisan serve
  ```

## Author
Eniola Agboola
