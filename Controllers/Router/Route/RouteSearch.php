<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;
use Controllers\UnitController;
use Models\UnitDAO;

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
        try {
            $search = $this->getParam($params, 'search', false);
            $column = $this->getParam($params, 'column');

            $unitDAO = new UnitDAO();
            $units = $unitDAO->search($search, $column);

            $this->controller->displaySearch($units);
        } catch (\Exception $e) {
            $this->controller->displaySearch(null, "Something went wrong: " . $e->getMessage());
        }
    }
}
