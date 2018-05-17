DI Container
============

A dead-simple and minimalistic PSR-11 Dependency Container.

Installation
------------

Add this repository to your composer config:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/ApinePHP/container"
    }
  ]
}
```

Then install the package with composer

```sh
composer require apine/container
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
