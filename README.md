### Ambiento API ###

### How do I get set up the development enviroment? ###

If the composer file and the vendor folder with the dependencies are not present. Execute the following commands:

    $ cd ambiento-api
    $ composer require slim/slim "^3.0"

With the composer.json and/or composer.lock file, just execute:

    $ cd ambiento-api
    $ composer install

To run the server:

    $ php -S localhost:8080 -t public public/index.php

* Dependencies
    - Slim PHP microframework
    - PHP 7
    - Composer
* Database configuration

    TODO
---
### Who do I talk to? ###
    $ name = Igor Phelype Guimarães
    $ email = igor.phelype@gmail.com
---