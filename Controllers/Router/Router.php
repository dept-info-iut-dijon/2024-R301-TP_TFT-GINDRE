<?php

namespace Controllers\Router;

use Controllers\MainController;
use Controllers\Router\Route\RouteAddOrigin;
use Controllers\Router\Route\RouteAddUnit;
use Controllers\Router\Route\RouteDelUnit;
use Controllers\Router\Route\RouteEditUnit;
use Controllers\Router\Route\RouteIndex;
use Controllers\Router\Route\RouteSearch;
use Controllers\UnitController;

class Router
{
    private array $routeList;
    private array $ctrlList;
    private string $action_key;

    /**
     * Router constructor.
     * @param string $name_of_action_key
     */
    function __construct(string $name_of_action_key = "action") {
        $this->action_key = $name_of_action_key;
        $this->createControllerList();
        $this->createRouteList();
    }

    private function createControllerList(): void
    {
        $this->ctrlList = [
            "main" => new MainController(),
            "unit" => new UnitController()
        ];
    }

    private function createRouteList(): void
    {
        $this->routeList = [
            "index" => new RouteIndex("", $this->ctrlList["main"]),
            "addUnit" => new RouteAddUnit("", $this->ctrlList["unit"]),
            "addUnitOrigin" => new RouteAddOrigin("", $this->ctrlList["unit"]),
            "search" => new RouteSearch("", $this->ctrlList["main"]),
            "delUnit" => new RouteDelUnit("", $this->ctrlList["unit"]),
            "editUnit" => new RouteEditUnit("", $this->ctrlList["unit"])
        ];
    }

    /**
     * Check the $_GET and $_POST to determine which route to use
     * @param array $get $_GET
     * @param array $post $_POST
     */
    public function routing(array $get, array $post): void
    {
        if (isset($post[$this->action_key])) {
            $action = $post[$this->action_key];
            $this->routeList[$action]->action($post, 'POST');
        } elseif (isset($get[$this->action_key])) {
            $action = $get[$this->action_key];
            $this->routeList[$action]->action($get, 'GET');
        } else {
            $this->routeList["index"]->action($get, 'GET');
        }
    }
}
