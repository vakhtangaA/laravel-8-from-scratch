<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Laravel from scratch

<p>
  This is a blog, where users can add, edit and delete blogs. Also you can add comments to the blog. Blog has filtering functionlaity, you can filter blogs by category or simply search something and if some part of blog containts the term, it will show up. 
</p>
<hr>

![image](https://user-images.githubusercontent.com/71987862/140066418-58424439-c833-44fd-a973-91b1bf3c9ecb.png)

<hr>

- [Installation](#installation)
- [Used Tools](#used-tools)
- [Prerequisites](#prerequisites)
- [Database](#database)
- [Resources](#resources)

## Installation

Clone this repository

```sh
git clone https://github.com/RedberryInternship/vakhtangchitauri-laravel-8-from-scratch.git
```

Install the dependencies

```sh
composer install
```

Setup your .env file.

```sh
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database blog
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```

## Used Tools

- <img src="/public/images/readme/mix.png" height="18" style="position: relative; top: 4px" /> [Laravel Mix](https://laravel-mix.com/) - Compiler
- <img src="./public/images/readme/jwt.png" height="18" style="position: relative; top: 4px" /> [JWT Auth](https://jwt-auth.readthedocs.io/en/develop/) - Authentication

## Prerequisites

- <img src="./public/images/readme/php.svg" width="35" style="position: relative; top: 4px" /> *PHP@7.3 and up*
- <img src="./public/images/readme/sqlite.png" width="35" style="position: relative; top: 14px" /> *Sqlite@3.36 and up*
- <img src="./public/images/readme/npm.png" width="35" style="position: relative; top: 4px" /> _npm@6 and up_
- <img src="./public/images/readme/composer.png" width="35" style="position: relative; top: 6px" /> _composer@2 and up_

## Database

schema made with **https://drawsql.app/**

![image](https://user-images.githubusercontent.com/71987862/140064703-f08ac358-c0b7-426f-9862-06f8819337e6.png)

See diagram here https://drawsql.app/redberry-9/diagrams/laravel-from-scratch

## Resources

[Figma Designs](https://www.figma.com/file/IIJOKK5esgM8uK8pM3D59J/Movie-Quotes?node-id=0%3A1)

[Drawsql](https://drawsql.app/)
