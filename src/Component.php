<?php
/**
 * Component
 *
 * @license MIT
 * @copyright 2018 Tommy Teasdale
 */
declare(strict_types=1);


namespace Apine\Container;

use Closure;
use Psr\Container\ContainerInterface;
use function call_user_func;

/**
 * Class Component
 *
 * @package Apine\Core\Container
 */
class Component
{
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var mixed
     */
    private $content;
    
    /**
     * @var bool
     */
    private $factory;
    
    /**
     * @var mixed
     */
    private $computed;
    
    /**
     * Component constructor.
     *
     * @param string $name
     * @param Closure $content
     * @param bool $factory
     */
    public function __construct(string $name, Closure $content, bool $factory = false)
    {
        $this->name = $name;
        $this->content = $content;
        $this->factory = $factory;
    }
    
    /**
     * @return bool
     */
    public function isFactory() : bool
    {
        return $this->factory;
    }
    
    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    
    /**
     * Invoke the content of the component
     *
     * The function of the component MAY accept a ContainerInterface
     * as its only parameter so it may retrieve it's dependencies
     *
     * @param ContainerInterface $container
     *
     * @return mixed
     * @throws \Throwable If an error occurs while reading
     *                      the content of the component
     */
    public function invoke(ContainerInterface $container)
    {
        try {
            if ($this->factory === true || $this->computed === null) {
                $this->computed = call_user_func($this->content, $container);
            }
            
            return $this->computed;
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
