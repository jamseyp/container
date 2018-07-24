<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 24/07/2018
 * Time: 09:19
 */

namespace Specter\Container;

use InvalidArgumentException;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class ParameterContainer
 *
 * @package Specter\Container
 * @author James Parker <jamseyp@gmail.com>
 */
class ParameterContainer extends Container
{
    /** @var ParameterBag */
    private $parameterBag;

    /**
     * ParameterContainer constructor.
     *
     * @param ParameterBag|null $parameterBag
     */
    public function __construct(ParameterBag $parameterBag = null)
    {
        $this->parameterBag = $parameterBag ?: new ParameterBag();
    }

    /**
     * Gets the service container parameter bag.
     *
     * @return ParameterBag A ParameterBagInterface instance
     */
    public function getParameterBag()
    {
        return $this->parameterBag;
    }

    /**
     * Gets a parameter.
     *
     * @param string $name The parameter name
     *
     * @return mixed The parameter value
     *
     * @throws InvalidArgumentException if the parameter is not defined
     */
    public function getParameter($name)
    {
        return $this->parameterBag->get($name);
    }

    /**
     * Checks if a parameter exists.
     *
     * @param string $name The parameter name
     *
     * @return bool The presence of parameter in container
     */
    public function hasParameter($name)
    {
        return $this->parameterBag->has($name);
    }

    /**
     * Sets a parameter.
     *
     * @param string $name The parameter name
     * @param mixed $value The parameter value
     */
    public function setParameter($name, $value)
    {
        $this->parameterBag->set($name, $value);

    }
}
