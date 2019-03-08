# The Library

This is a Laravel project that you can manage a library. In this Laravel project you can create profiles, books and categories. You'll see a dashboard that you can manage filtering by category also you can change every book if the book will be available or not, you can delete or edit all of them as well.

# Getting started

## Launch the project

First you need to install Composer:
`php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"`

Run this code on your terminal `mv composer.phar /usr/local/bin/composer` to make composer globally.

Clone this repository.

Go to the folder application using `cd` on your terminal.

Run `composer install`

Copy `.env.example` file to `.env` on the root project folder. You can type `cp .env.example .env` on your terminal.

Open your `.env` file and change the database name (`DB_DATABASE`) to whatever you have, username (`DB_USERNAME`) and password (`DB_PASSWORD`) field correspond to your configuration.

Run `php artisan key:generate`

Run `php artisan migrate`

Run `php artisan serve`

Project is already up!!!

# License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).