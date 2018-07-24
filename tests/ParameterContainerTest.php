<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 24/07/2018
 * Time: 09:28
 */

use Specter\Container\ParameterContainer;
use PHPUnit\Framework\TestCase;

/**
 * Class ParameterContainerTest
 */
class ParameterContainerTest extends TestCase
{

    /**
     * @covers \Specter\Container\ParameterContainer::__construct()
     * @covers \Specter\Container\ParameterContainer::getParameterBag()
     */
    public function testCanConstructWithNoArgs()
    {
        $container = new ParameterContainer();

        $this->assertInstanceOf(\Symfony\Component\HttpFoundation\ParameterBag::class,
            $container->getParameterBag());
    }

    /**
     * @covers \Specter\Container\ParameterContainer::__construct()
     */
    public function testConstructWithArgs()
    {
        $bag = new \Symfony\Component\HttpFoundation\ParameterBag([
            'config.debug' => true
        ]);

        $container = new ParameterContainer($bag);

        $this->assertInstanceOf(\Symfony\Component\HttpFoundation\ParameterBag::class,
            $container->getParameterBag());
    }

    /**
     * @covers \Specter\Container\ParameterContainer::__construct()
     * @covers \Specter\Container\ParameterContainer::set()
     */
    public function testSetParameter()
    {
        $bag = new \Symfony\Component\HttpFoundation\ParameterBag([
            'config.debug' => true
        ]);

        $container = new ParameterContainer($bag);

        $this->assertInstanceOf(\Symfony\Component\HttpFoundation\ParameterBag::class,
            $container->getParameterBag());

        $container->setParameter('config.foo', 'baz');

    }

    public function testHasParameter()
    {
        $bag = new \Symfony\Component\HttpFoundation\ParameterBag([
            'config.debug' => true
        ]);

        $container = new ParameterContainer($bag);

        $this->assertInstanceOf(\Symfony\Component\HttpFoundation\ParameterBag::class,
            $container->getParameterBag());

        $container->setParameter('config.foo', 'baz');

        $this->assertTrue($container->hasParameter('config.foo'));
    }

    /**
     * @covers \Specter\Container\ParameterContainer::get()
     */
    public function testGetParameter()
    {
        $bag = new \Symfony\Component\HttpFoundation\ParameterBag([
            'config.debug' => true
        ]);

        $container = new ParameterContainer($bag);

        $this->assertInstanceOf(\Symfony\Component\HttpFoundation\ParameterBag::class,
            $container->getParameterBag());

        $container->setParameter('config.foo', 'baz');

        $this->assertTrue($container->hasParameter('config.foo'));

        $this->assertEquals('baz', $container->getParameter('config.foo'));
    }
}
