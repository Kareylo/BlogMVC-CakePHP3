# CakePHP 3 - BlogMVC

A simple CakePHP 3 application to see how CakePHP 3 works !

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `composer install`.
3. Edit `config/app.php` with your databases informations (Search "Datasources")
4. Run 
```bash
bin/cake migrations migrate
bin/cake migrations seed
```
You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.
