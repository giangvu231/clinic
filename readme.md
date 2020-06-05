# Getting started

## Launch the starter project


Clone this repository and run this in your newly created directory:

``` bash
composer install
```

Next you need to make a copy of the `.env.example` file and rename it to `.env` inside your project root.
```
cp .env.example .env
```

Run the following command to generate your app key:

```
php artisan key:generate
```

Then start your server:

```
php artisan serve
```

Your Laravel starter project is now up and running on localhost:8000! 