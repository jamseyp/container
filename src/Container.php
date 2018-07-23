<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 23/07/2018
 * Time: 20:17
 */

namespace Specter\Container;

use Psr\Container\ContainerInterface;
use Specter\Container\Exceptions\DuplicateServiceException;
use Specter\Container\Exceptions\ServiceNotFoundException;

/**
 * Class Container
 * @package Specter\Container
 * @author James Parker <jamseyp@gmail.com>
 */
class Container implements ContainerInterface
{
    /**
     * An array of all the container resources
     *
     * @var array
     */
    private $resources = [];

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     * @param string $id
     *
     * @return bool
     */
    public function has($id)
    {
        return array_key_exists($id, $this->resources);
    }

    /**
     * Finds a service from the container.
     * If the service is not found a ServiceNotFoundException will be thrown.
     *
     * @param string $id
     * @return mixed
     *
     * @throws ServiceNotFoundException
     */
    public function get($id)
    {
        if (!$this->has($id)) {
            //@codeCoverageIgnoreStart
            throw new ServiceNotFoundException($id);
            //@codeCoverageIgnoreEnd
        }

        return $this->resources[$id];
    }

    /**
     * Sets a service to the container.
     * if the resource already exists, then it will thrown an exception.
     *
     * @param string $id the ID of the service.
     * @param mixed $service the service to set.
     *
     * @return void
     * @throws DuplicateServiceException
     */
    public function set($id, $service)
    {
        if ($this->has($id)) {
            //@codeCoverageIgnoreStart
            throw new DuplicateServiceException($id);
            //@codeCoverageIgnoreEnd
        }
        $this->resources[$id] = $service;

    }
}