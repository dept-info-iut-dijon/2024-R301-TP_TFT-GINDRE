<?php

require_once 'Helpers/Psr4AutoloaderClass.php';

$loader = new \Helpers\Psr4AutoloaderClass();

$loader->register();

$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', '/Vendor/Plates/src');
$loader->addNamespace('\Controllers', '/Controllers');
$loader->addNamespace('\Config', '/Config');
$loader->addNamespace('\Models', '/Models');

$mainController = new \Controllers\MainController();

$mainController->index();