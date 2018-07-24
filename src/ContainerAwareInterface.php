<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 24/07/2018
 * Time: 09:12
 */

namespace Specter\Container;

/**
 * @codeCoverageIgnore
 *
 * Interface ContainerAwareInterface
 *
 * @package Specter\Container
 */
interface ContainerAwareInterface
{
    /**
     * Sets the container.
     * @param Container $container
     *
     *
     * @return mixed
     */
    public function setContainer(Container $container);
}