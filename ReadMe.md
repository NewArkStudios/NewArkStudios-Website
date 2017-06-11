NewArkStudios Website
Written in Lararvel Framework

Debug Tools
-laravel
-laravel debugbar

Issues and Troubleshooting
- Make sure storage is writable by 

``` php
# Group Writable (Group, User Writable)
$ sudo chmod -R gu+w storage

# World-writable (Group, User, Other Writable)
$ sudo chmod -R guo+w storage
```
- Make sure bootstrap cache is writeable as well
chmod 777 bootstrap/cache

## Development Environment
Visual Studio Code with xdebug and xdebug extension
Lampp server change etc/http.conf to follow this https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug
pointing to installed xdebug on local machine

**Files Ignored are listed under .gitignore and .git/info/exclude**

## Database Configuration 
**Change .env file**
Note password and username listed in master docs
Migrate appropriate databases and install
```
php artisan migrate:install

php artisan migrate
```
To make new databases in laravel simply call

```
php artisan migrate:<migration_name> --create=<table_name>
```

To seed a database, in "DatabaseSeeder.php" add
```
    $this->call(<SeedName>::class);
```
Create the seed with 
```
    php artisan make:seeder <SeedName>
    // once complete and coded for seed with
    php artisan db:seed
```

Note if one cannot seed then we need to update our autload files
as they may not be synced

```
composer dump-autoload
```


If run into errors delete migrations table and already existing tables


## Additional Notes and Tasks to Do Later, strikethroughs mean completed
- Forget Password sending
- Setup Mailing Account - https://stackoverflow.com/questions/29100877/trying-to-get-laravel-5-email-to-work
~~ Change post url to slugs when time is free - https://github.com/cviebrock/eloquent-sluggable - laravel tut 15 ~~
~~ Bump system in, for forums post ~~
- Create Admin accounts to post Annoucements
- Pinned Posts
