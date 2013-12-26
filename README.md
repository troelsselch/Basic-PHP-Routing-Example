Basic PHP Routing Example
=========================

A basic example of how to route a url request to corresponding functionality.

The project includes a simple `.htaccess` file which redirects calls such as `example.com/wishlist/123` to `example.com/index.php`.

Requirements
============

Apache `VirtualHost` setting must allow overrides (`AllowOverride All`), for example as below:

    <VirtualHost *:80>
        ...
        DocumentRoot /var/www
        <Directory /var/www/>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>
        ...
    </VirtualHost>

Things to consider
==================

* Using Dependency Injection Container (e.g. [PHP-DI] [1] or [Pimple] [2]) or [PSR-0] [3] for loading the commands.
* Add proper error handling instead of just outputting 'Command unknown!'.

  [1]: http://php-di.org/
  [2]: http://pimple.sensiolabs.org/
  [3]: http://www.php-fig.org/psr/psr-0/ "PSR-0 Standard"
