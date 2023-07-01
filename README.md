<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Introduction

This project is a test assessment. It is made with Laravel 10, jQuery, AdminLTE.

## Installing

Make sure you have PHP and Composer installed globally on your computer.

Clone the repo and enter the project folder
```
git clone https://github.com/PetruSova2004/HttpManagement.git
cd HttpManagement
```

Install all needed dependencies
```
composer install
npm install
```

After all dependencies are installed add configuration file. You have to make a .env file and paste there content from .env.example.
```
cp .env.example .env 
```

The next step is to run migrations and seeds locally.
```
php artisan migrate
php artisan db:seed
```

After you run the migrations and seeds you already have in db an admin user with credentials: 

**login: admin \
password: qweqwe**

Great! Now you can use this project. You can open it by accessing [this link](http://127.0.0.1:8001/login).



