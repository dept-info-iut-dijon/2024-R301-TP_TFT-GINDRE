<?php

namespace Controllers;

class UnitController
{
    private $templates;

    public function __construct()
    {
        $this->templates = new \League\Plates\Engine('Views');
    }

    public function displayAddUnit(): void {
        echo $this->templates->render('add-unit');
    }

    public function displayAddOrigin():void {
        echo $this->templates->render('add-origin');
    }

    public function displayEditUnit(string $id): void
    {
        $unitDAO = new \Models\UnitDAO();
        $unit = $unitDAO->getByID($id);

        echo $this->templates->render('add-unit', [
            'unit' => $unit
        ]);
    }

    public function deleteUnits()
    {
        header('Location: /?action=index&message=' . urlencode('Units deleted successfully'));
    }
}
