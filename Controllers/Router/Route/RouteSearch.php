<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;
use Controllers\UnitController;

class RouteSearch extends Route
{
    /**
     * @inheritDoc
     */
    function get(array $params = []): void
    {
        $this->controller->displaySearch();
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void
    {
        // TODO: Implement post() method.
    }
}
