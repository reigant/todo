# PHP TODO Apps

## How to Deploy
__1. Install Git__

Open your console and run this command
```console
sudo apt-get install git
```

__2. Install Composer__
```console
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

__3. Clone this Repository__
```console
git clone https://github.com/reigant/todo.git && cd todo
```
__4. Copy .env File__
```console
cp .env.example .env
```

__5. Setting Connection__
Open file .env, change on

`DB_DATABASE=<YOUR_DB_CONNECTION>`

`DB_USERNAME=<YOUR_USERNAME_CONNECTION>`

`DB_PASSWORD=<YOUR_PASSWORD_CONNECTION>`

__6. Install Composer Project__
```console
composer install
```

__7. Run Migration & Database Seeds__
```console
php artisan migrate
php artisan db:seed
```

__8. Run Laravel Server__
```console
php artisan serve
```

__9. Test on your browser__

Open your browser and type http://127.0.0.1:8000

If everything is working, you'll see a welcome page

__10. Launch Todo Program__

Click link `PROGRAM` on welcome page or type `http://127.0.0.1:8000/todo` on your browser, that will redirect to todo program.

If everything is working, you'll see a todo program page. Feel free to test

__11. Edit Seed__

Edit config file in `database/seeds/DatabaseSeeder.php`


#### Thank You
