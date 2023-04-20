<?php
require '../backend/Controllers/Controller.php';
require '../backend/Classes/Database.php';
require '../backend/Models/Delivery.php';

$mainController = new Controller();

var_dump($_POST);
var_dump($mainController->insertData()); die();
