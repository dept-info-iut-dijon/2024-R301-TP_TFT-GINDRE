<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;
use Controllers\UnitController;

class RouteAddUnit extends Route
{
    /**
     * @inheritDoc
     */
    function get(array $params = []): void
    {
        $this->controller->displayAddUnit();
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void
    {
        // TODO: Implement post() method.
    }
}
