<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;

class RouteEditUnit extends Route
{

    /**
     * @inheritDoc
     */
    function get(array $params = []): void
    {
        if (isset($params['id'])) {
            $this->controller->displayEditUnit($params['id']);
        } else {
            $this->controller->displayEditUnit();
        }
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void
    {
        // TODO: Implement post() method.
    }
}
