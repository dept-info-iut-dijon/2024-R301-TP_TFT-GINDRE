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
     * @param string $message Message à afficher
     */
    public function index(string $message = '') : void {
        $unitDAO = new \Models\UnitDAO();
        $units = $unitDAO->getAll();

        echo $this->templates->render('home', [
            'tftSetName' => 'Remix Rumble',
            'units' => $units,
            'message' => $message
        ]);
    }

    /**
     * Affiche la page de recherche
     */
    public function displaySearch(?array $units = null, ?string $message = null) : void {
        $unitDAO = new \Models\UnitDAO();
        $columnNames = $unitDAO->getColumnNames();

        echo $this->templates->render('search', [
            'columnNames' => $columnNames,
            'units' => $units,
            'message' => $message
        ]);
    }
}
