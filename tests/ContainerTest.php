<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 23/07/2018
 * Time: 20:43
 */

namespace Specter\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Specter\Container\Container;
use Specter\Container\Exceptions\DuplicateServiceException;
use Specter\Container\Exceptions\ServiceNotFoundException;

class ContainerTest extends TestCase
{

    /**
     * @covers \Specter\Container\Container
     */
    public function testIsInstanceOfPSR11()
    {
        $container = new Container();

        $this->assertInstanceOf(ContainerInterface::class, $container);
    }

    /**
     * @covers \Specter\Container\Container::set()
     * @covers \Specter\Container\Container::get()
     *
     * @throws \Specter\Container\Exceptions\DuplicateServiceException
     * @throws \Specter\Container\Exceptions\ServiceNotFoundException
     */
    public function testSet()
    {
        $container = new Container();

        $container->set('foo', false);
        $container->set('baz', 132321);
        $container->set('boz', 838.22);

        $this->assertFalse($container->get('foo'));
        $this->assertEquals(838.22, $container->get('boz'));
        $this->assertEquals(132321, $container->get('baz'));
    }


    /**
     * @covers \Specter\Container\Container::has()
     *
     * @throws \Specter\Container\Exceptions\DuplicateServiceException
     */
    public function testHas()
    {
        $container = new Container();

        $container->set(\DateTime::class, new \DateTime());
        $container->set('foo', false);

        $this->assertTrue($container->has('foo'));
        $this->assertFalse($container->has('baz'));
        $this->assertTrue($container->has(\DateTime::class));

    }

    /**
     * @covers \Specter\Container\Exceptions\ServiceNotFoundException
     *
     * @throws ServiceNotFoundException
     */
    public function testThrowsExceptionOnNotFoundService()
    {
        $container = new Container();

        $this->expectException(ServiceNotFoundException::class);
        $this->expectExceptionMessage('the service foo was not found in the container');

        $container->get('foo', false);
    }

    /**
     * @covers \Specter\Container\Exceptions\DuplicateServiceException
     *
     * @throws DuplicateServiceException
     */
    public function testThrowsExceptionOnDuplicateService()
    {
        $container = new Container();

        $container->set(\DateTime::class, new \DateTime());

        $this->expectException(DuplicateServiceException::class);
        $this->expectExceptionMessage(sprintf('the service %s already exists', \DateTime::class));

        $container->set(\DateTime::class, new \DateTime());
    }
}
