# Laravel Shopify Simple CRUD App
Laravel Shopify App for Product, Customer, and Order CRUD
This app uses PHP SDK Shopify API https://github.com/phpclassic/php-shopify

## Requirements
Composer, PHP and Mysql(MariaDB) Server.

PHP and Dependencies for Laravel

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension

### Shopify Account
1) Register as developer Shopify partner - https://developers.shopify.com/
2) Set up Shopify private app - https://help.shopify.com/api/getting-started/authentication/private-authentication

## Installation
1) Create environment configuration file

Copy that example .env file with this command
```shell
cp .env.exampe .env
```

Edit that new .env file
```shell
vi .env
```

Update these config variables
```shell
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Add this code right below DB config
```shell
SHOPIFY_URL = your-store@myshopify.com
SHOPIFY_API_KEY = your-store-api-key
SHOPIFY_PASSWORD = your-store-pass
SHOPIFY_SHARED_SECRET = your-store-share-key
SHOPIFY_REDIRECT_URI = redirect_url
SHOPIFY_PARTNER_API_KEY = partner-app-api-key
SHOPIFY_PARTNER_API_SECRET = partner-app-secret-key
```

2) Generate application key

Run artisan command
```shell
php artisan key:generate
```
It generates a random key which is automatically added to .env file APP_KEY variable.

3) Migrating DB Schema

```shell
php artisan migrate
```

## Setup Host Server

So you don't have to run 'PHP artisan serve' all the time 

#### Windows (Apache i.e. xampp)
1) Open a notedpad via right-click and "Run as Administrator"
3) From within that notepad, CTRL+o to open a file
4) Locate "hosts" file in C:\Windows\System32\drivers\etc
5) In File Extension select "All Files"
6) There you'll see "hosts" file. Choose to open it

Add your server url
```php
127.0.0.1 local.laravel.shopify
```

7) locate and open your Apache vhost config file in C:\xampp\apache\conf\extra\httpd-vhosts.conf (Refer to your Apache config to locate the vhost file)

Add this server url to listen to port :80
```php
<VirtualHost local.laravel.shopify:80>
    DocumentRoot "you-app-folder/public"
</VirtualHost>
```

Now Restart your Apache


#### Nginx
1) Locate your server block and apply this config setup

```php
	server {
    listen 80;
    server_name local.laravel.shopify;
    root /you-app-folder/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Then RESTART your nginx server


### Happy Coding!

