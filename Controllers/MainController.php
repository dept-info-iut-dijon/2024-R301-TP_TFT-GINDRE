<?php

namespace Controllers;

class MainController
{
    private $templates;

    public function __construct()
    {
        $this->templates = new \League\Plates\Engine('Views');
    }

    public function index() : void {
        echo $this->templates->render('home', ['tftSetName' => 'Remix Rumble']);
    }
}