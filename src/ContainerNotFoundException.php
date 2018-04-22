<?php
/**
 * ContainerNotFoundException
 *
 * @license MIT
 * @copyright 2018 Tommy Teasdale
 */

namespace Apine\Container;


use Psr\Container\NotFoundExceptionInterface;

class ContainerNotFoundException extends \Exception implements NotFoundExceptionInterface
{
    
}
