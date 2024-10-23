<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;

class RouteDelUnit extends Route
{

    /**
     * @inheritDoc
     */
    function get(array $params = []): void
    {
        $this->controller->deleteUnits();
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void
    {
        // TODO: Implement post() method.
    }
}
