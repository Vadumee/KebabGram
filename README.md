# Kebabstagram



## Create your project:

1. First in your terminal: `$ git clone https://github.com/Vadumee/KebabGram.git kebabstagram`
2. Then move inside that directory, `$ cd kebabstagram`
3. Then run composer, `$ composer install`

### Run it:

1. Open terminal, `$ cd kebabstagram` (the root of the git clone)
2. Create the database in _installation directory

## Key directories

* `app`: Application code
* `app`: All class files within the `App` namespace
* `resources/views`: Twig template files
* `cache/twig`: Twig's Autocreated cache files
* `public`: Webserver root
* `vendor`: Composer dependencies

## Key files

* `public/index.php`: Entry point to application
* `bootstrap/settings.php`: Configuration
* `bootstrap/dependencies.php`: Services for Pimple
* `bootstrap/middleware.php`: Application middleware
* `app/routes.php`: All application routes are here
* `app/Controllers/Controllers/HomeAction.php`: Home controller for the home page
* `resources/views/home.twig`: Twig template file for the home page
