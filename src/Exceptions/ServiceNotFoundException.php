<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 23/07/2018
 * Time: 20:23
 */

namespace Specter\Container\Exceptions;

/**
 * Class ServiceNotFoundException
 * A ServiceNotFoundException should be thrown when the service is not in the container.
 *
 * @package Specter\Container\Exceptions
 * @author James Parker <jamseyp@gmail.com>
 */
class ServiceNotFoundException extends \Exception
{
    /**
     * ServiceNotFoundException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct(sprintf('the service %s was not found in the container', $message));
    }
}