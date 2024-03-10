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
│   ├── create_user
│   └── doctrine
├── bootstrap.php
├── composer.json
├── composer.lock
├── phpunit.xml
├── public
│   ├── assets
│   │   ├── css
│   │   │   └── bulma.min.css
│   │   └── js
│   │       ├── htmx.min.js
│   │       └── _hyperscript.min.js
│   └── index.php
├── README.md
├── settings.php
├── settings.php.dist
├── src
│   ├── Action
│   │   ├── HomeController.php
│   │   └── UserController.php
│   ├── Domain
│   │   └── User.php
│   ├── Repository
│   │   └── UserRepository.php
│   └── View
│       ├── full
│       │   ├── about.twig
│       │   ├── index.twig
│       │   └── users.twig
│       └── partial
│           ├── about.twig
│           └── users.twig
├── tests
│   ├── Feature
│   │   └── ExampleTest.php
│   ├── Pest.php
│   ├── TestCase.php
│   └── Unit
│       └── ExampleTest.php
└── var
    ├── coverage
    ├── database.sqlite
    └── doctrine
```
