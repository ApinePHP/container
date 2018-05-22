DI Container
============

A minimalistic PSR-11 Dependency Container.

Installation
------------

Installation is made with composer

```sh
composer require apinephp/container
```

The package requires PHP 7.2 or newer.

Usage Example
-------------

```php
<?php
    
require '/path/to/vendor/autoload.php';

use Apine\Container\Container;

$container = new Container();
$container->register('service', function () {
    return 'A service';
});

$container->get('service'); // 'A service'
```
