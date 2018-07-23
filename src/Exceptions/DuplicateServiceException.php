<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 23/07/2018
 * Time: 20:26
 */

namespace Specter\Container\Exceptions;

use Psr\Container\ContainerExceptionInterface;

/**
 * Class DuplicateServiceException
 * DuplicateServiceException will be thrown when the resource allready exists.
 * @package Specter\Container\Exceptions
 *
 * @author James Parker <jamseyp@gmail.com>
 */
class DuplicateServiceException extends \Exception implements ContainerExceptionInterface
{
    /**
     * DuplicateServiceException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct(sprintf('the service %s already exists', $message));
    }
}