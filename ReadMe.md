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
