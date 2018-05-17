<?php
/**
 * ComponentTest
 *
 * @license MIT
 * @copyright 2018 Tommy Teasdale
 */

/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection ReturnTypeCanBeDeclaredInspection */
/** @noinspection PhpUndefinedClassInspection */

declare(strict_types=1);

use Apine\Container\Component;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class ComponentTest extends TestCase
{
    public function testConstructor()
    {
        $object = new class(){};
        $component = new Component('component', function() use ($object) {
            return $object;
        }, false);
        $this->assertAttributeEquals('component', 'name', $component);
        $this->assertAttributeEquals(false, 'factory', $component);
    }
    
    public function testIsFactory()
    {
        $object = new class(){};
        $component = new Component('component', function () use ($object) {
            return new $object;
        }, true);
        
        $this->assertEquals(true, $component->isFactory());
    }
    
    public function testGetName()
    {
        $object = new class(){};
        $component = new Component('component', function () use ($object) {
            return new $object;
        }, true);
    
        $this->assertEquals('component', $component->getName());
    }
    
    public function testInvoke()
    {
        $component = new Component('component', function () {
            return 'text_content';
        });
        $container = $this->getMockBuilder(ContainerInterface::class)
            ->setMethods(['get', 'has'])->getMockForAbstractClass();
        
        $value = $component->invoke($container);
        $this->assertAttributeNotEmpty('computed', $component);
        $this->assertEquals('text_content', $value);
    }
}

class TestClass{}
