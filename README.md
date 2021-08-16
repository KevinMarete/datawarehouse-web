# DATAWAREHOUSE-WEB

Datawarehouse-web is the core web application for the MGIC KenyaEMR DataWarehouse.

---

## Requirements

For development, you will only need PHP 8+ and a php global package manager, composer, installed in your environment.

## Install

    $ git clone https://github.com/KevinMarete/datawarehouse-web
    $ cd datawarehouse-web
    $ composer install

## Configure app

Rename `.env.example` to `.env` then edit it with your custom settings. You will need:

-   Database Configuration
-   Email Configuration

## Running the database migration

    $ php artisan migrate

## Resources

-   [Passport Setup](https://stackoverflow.com/questions/39414956/laravel-passport-key-path-oauth-public-key-does-not-exist-or-is-not-readable)
-   Docker Resources
    -   [Docker + Laravel + Nginx + MySQL](https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose)
    -   [Docker on Ubuntu 18.04](https://www.digitalocean.com/community/tutorials/how-to-containerize-a-laravel-application-for-development-with-docker-compose-on-ubuntu-18-04)

## Running the development server

    $ php artisan serve
    $ php artisan serve --port 8001

Go to browser and launch application on `http://localhost:8000`

## Running on docker

    $ docker-compose up

Go to browser and launch application on `http://localhost:85`

## Default credentials for the app

Default Credentials are as follows:

-   Admin Account
    - Username: admin@gmail.com 
    - Password: admin123

-   User Account
    -   Username: user@gmail.com 
    -   Password: user123