<div align="center">
	<p><img src="headerbulik.png" alt="Bulik"></p>
</div>

### Install

Clone this repository and enter the project's directory:

```shell
cd projectbulik
```

Install dependencies with Composer:

```shell
composer install
```

Compile the project assets:

```shell
npm install
```

```shell
npm run dev
```

## Configure your .env

Copy the `.env.example` into `.env`

```shell
cp .env.example .env 
```

Set up the database credentials in `.env` file:

```shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3308
DB_DATABASE=**your database name**
DB_USERNAME=**your database user**
DB_PASSWORD=**your database password**
```

Generate the application key.

```shell
php artisan key:generate
```

## Prepare your Database

Run the migrations.

```shell
php artisan migrate:fresh
```

## Access the Website

Serve your project:

```shell
php artisan serve
```
To create new new admin account, open this url:

```shell
./secretdaftar
```
