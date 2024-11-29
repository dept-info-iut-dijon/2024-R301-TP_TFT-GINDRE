<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;
use Controllers\UnitController;
use Models\Unit;
use Models\UnitDAO;

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
        try {
            $unit = new Unit();
            $unit->setName($this->getParam($params, 'name', false));
            $unit->setCost($this->getParam($params, 'cost', false));
            $unit->setUrlImg($this->getParam($params, 'imgUrl', false));
            $unitDAO = new UnitDAO();
            $unitDAO->addUnit($unit);

            $origins = $this->getParam($params, 'origin');
            foreach ($origins as $origin) {
                $unitDAO->addUnitOrigin($unit, $origin);
            }

            header('Location: /?message=' . urlencode('Unit added successfully'));
        } catch (\Exception $e) {
            $this->controller->displayAddUnit("Something went wrong: " . $e->getMessage());
        }
    }
}
