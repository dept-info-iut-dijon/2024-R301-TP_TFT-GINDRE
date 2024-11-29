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
        try {
            $this->controller->deleteUnits($this->getParam($params, 'id', false));
            $message = "Unit deleted successfully";
        } catch (\Exception $e) {
            $message = "Something went wrong: " . $e->getMessage();
        }
        header('Location: /?message=' . urlencode($message));
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void
    {
        // TODO: Implement post() method.
    }
}
