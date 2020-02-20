<?php
declare(strict_types=1);

//include all your model files here
require 'Model/Customer.php';
require 'Model/Product.php';
//include all your controllers here
require 'Controller/HomepageController.php';
session_start();

$controller = new HomepageController();

if(!isset($_SESSION) || $_SERVER["REQUEST_METHOD"] == "GET") {
    $controller->loadObjects();
}
$controller->render($_POST);
