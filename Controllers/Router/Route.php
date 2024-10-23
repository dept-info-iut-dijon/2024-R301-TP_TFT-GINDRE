<?php

namespace Controllers\Router;

use Controllers\MainController;
use Exception;

abstract class Route
{
    protected object $controller;

    /**
     * Constructor of the Route
     * @param string $message Test
     * @param object $controller The controller to use
     */
    function __construct(string $message, object $controller) {
        $this->controller = $controller;
    }

    /**
     * Execute the action
     * @param array $params Array of parameters
     * @param string $method Method to use
     */
    function action(array $params = [], string $method='GET'): void {
        if ($method === 'GET') {
            $this->get($params);
        } else {
            $this->post($params);
        }
    }

    /**
     * Get a parameter from an array
     * @param array $array Array of parameters
     * @param string $paramName Name of the parameter
     * @param bool $canBeEmpty If the parameter can be empty
     * @throws Exception If the parameter is empty or absent
     */
    protected function getParam(array $array, string $paramName, bool $canBeEmpty=true): array
    {
        if (isset($array[$paramName])) {
            if (!$canBeEmpty && empty($array[$paramName]))
                throw new Exception("Paramètre '$paramName' vide");
            return $array[$paramName];
        } else
            throw new Exception("Paramètre '$paramName' absent");
    }

    /**
     * get method
     * @param array $params Array of parameters
     */
    abstract function get(array $params = []): void;

    /**
     * post method
     * @param array $params Array of parameters
     */
    abstract function post(array $params = []): void;
}
