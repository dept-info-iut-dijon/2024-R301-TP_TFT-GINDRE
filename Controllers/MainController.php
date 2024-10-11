<?php

namespace Controllers;

class MainController
{
    private $templates;

    public function __construct()
    {
        $this->templates = new \League\Plates\Engine('Views');
    }

    /**
     * Affiche la page d'accueil
     */
    public function index() : void {
        $unitDAO = new \Models\UnitDAO();
        $units = $unitDAO->getAll();
        $existingUnit = $unitDAO->getByID(1);
        $nonExistingUnit = $unitDAO->getByID(1000);

        echo $this->templates->render('home', [
            'tftSetName' => 'Remix Rumble',
            'units' => $units,
            'existingUnit' => $existingUnit,
            'nonExistingUnit' => $nonExistingUnit
        ]);
    }
}