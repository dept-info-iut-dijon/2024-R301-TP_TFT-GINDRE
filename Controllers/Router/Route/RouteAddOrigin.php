<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;
use Controllers\UnitController;
use Models\Origin;
use Models\OriginDAO;

class RouteAddOrigin extends Route
{
    /**
     * @inheritDoc
     */
    function get(array $params = []): void
    {
        $this->controller->displayAddOrigin();
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void
    {
        try {
            $origin = new Origin([
                'name' => $this->getParam($params, 'name', false),
                'url_img' => $this->getParam($params, 'imgUrl', false)
            ]);

            $originDAO = new OriginDAO();
            $originDAO->create($origin);

            header('Location: /?message=' . urlencode('Origin added successfully'));
        } catch (\Exception $e) {
            $this->controller->displayAddOrigin("Something went wrong: " . $e->getMessage());
        }
    }
}
