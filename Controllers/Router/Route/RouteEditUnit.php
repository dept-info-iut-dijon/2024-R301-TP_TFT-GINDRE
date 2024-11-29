<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;
use Models\Unit;
use Models\UnitDAO;

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
            $this->controller->displayAddUnit();
        }
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void
    {
        try {
            $unit = new Unit();
            $unit->setId($this->getParam($params, 'id', false));
            $unit->setName($this->getParam($params, 'name', false));
            $unit->setCost($this->getParam($params, 'cost', false));
            $unit->setUrlImg($this->getParam($params, 'imgUrl', false));

            $unitDAO = new UnitDAO();
            $unitDAO->updateUnit($unit);

            $origins = $this->getParam($params, 'origin', false);
            $originDAO = new \Models\OriginDAO();
            $originDAO->updateOrigins($unit->getId(), $origins);

            header('Location: /?message=' . urlencode('Unit updated successfully'));
        } catch (\Exception $e) {
            $this->controller->displayEditUnit($this->getParam($params, 'id', false), "Something went wrong: " . $e->getMessage());
        }
    }
}
