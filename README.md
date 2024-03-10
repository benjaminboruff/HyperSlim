# HyperSlim

A simple Hypermedia oriented stack for PHP.

- [Slim](http://slimframework.com)
- [PHP-DI](http://php-di.org)
- [Doctrine](http://doctrine-project.org)
- [Twig](http://twig.symfony.com)
- [htmx](http://htmx.org)
- [\_hyperscript](http://hyperscript.org)
- [Bulma](http://bulma.io)

## Requirements

- PHP 8.3.x
- Composer
- This template assumes the target system is Linux, or similar.

## Installation

- **Easy:** Just create your own repo from this template, then `git clone` it.
- **Harder:** `git clone` this repo, then change it's name, nuke the `.git` dir, etc.

## Setup

- `composer install` the PHP dependencies.
- `chmod u+x` on all files in `/bin` to make them executable.
- `composer start` at least once to create the `/var/database.sqlite` file.
- `./bin/doctrine orm:schema-tool:create` to "migrate" the Domain models to the database.

Running `./bin/doctrine` will show the available `doctrine` commands.

There is no `JS` build system; `/public/assets/js/htmx.min.js` and `/public/assets/js/_hyperscript.min.js`
must be managed manually, unless you add your own build steps.

The single `CSS` file in `/public/assets/css/bulma.min.css` must also be updated manually.

This allows an offline dev experience. Of course, you can link to those files directly if you know you
will be working online most of the time.

## Application Structure

```
├── bin
│ ├── create_user   // A sample CLI script to add users. There is no error checking. Beware.
│ └── doctrine      // The CLI runner for all Doctrine commands.
├── bootstrap.php   // Primarily sets up the DI container with Doctrine settings, and autoloads the PHP classes, etc.
├── composer.json
├── composer.lock
├── phpunit.xml
├── public
│ ├── assets
│ │ ├── css
│ │ │ └── bulma.min.css
│ │ └── js
│ │ ├── htmx.min.js
│ │ └── \_hyperscript.min.js
│ └── index.php         // The main app file that pulls it all together. The routes are defined here ...
├── settings.php        // Modify this to suit local needs. This is automatically copied from settings.php.dist if it doesn't exist.
├── settings.php.dist   // The template for the real settings.php.
├── src
│ ├── Action            // The home for controllers, services, ...
│ │ ├── HomeController.php
│ │ └── UserController.php
│ ├── Domain            // The domain models
│ │ └── User.php
│ ├── Repository        // Repositories that separate database logic from domain models and actions.
│ │ └── UserRepository.php
│ └── View              // The home for views ...
│ ├── about.twig
│ ├── index.twig
│ └── users.twig
├── tests               // Tests ...
│ ├── Feature
│ │ └── ExampleTest.php
│ ├── Pest.php
│ ├── TestCase.php
│ └── Unit
│ └── ExampleTest.php
└── var                 // A home for various app side effects.
├── coverage
├── database.sqlite     // The sqlite file will be automatically created the first time the app is run (and accessed), unless it already exists.
└── doctrine
```
