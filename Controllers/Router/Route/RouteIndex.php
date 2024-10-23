<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;

class RouteIndex extends Route
{
    /**
     * @inheritDoc
     */
    function get(array $params = []): void
    {
        $message = '';
        if (isset($params['message'])) {
            $message = $params['message'];
        }
        $this->controller->index($message);
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void
    {
        // TODO: Implement post() method.
    }
}
