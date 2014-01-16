## Laravel - Angular Restricted System

This is a template to have a web application with angular which restricts access to the admin panel

Steps to install:

1) Add Composer

```Shell
curl -sS https://getcomposer.org/installer | php
```

2) Install Composer dependencies

```Shell
php composer.phar install
```

3) Migrate Database

```Shell
php artisan migrate
```

4) Add your first user in the seeds found on /app/database/seeds/DatabaseSeeder.php example:

5) Seed the database, this repo comes with an sqlite database, you need to use something different for
production, see http://laravel.com/docs/database#configuration to learn how to setupo mysql or something else

```Shell
php artisan db:seed
```

6) Install Bower dependencies

```Shell
cd public
bower install
```

7) Profit!
