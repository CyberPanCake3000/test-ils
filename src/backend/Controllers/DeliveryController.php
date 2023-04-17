<?php
require '../Models/DeliveryModel.php';

class DeliveryController
{
    public function __construct()
    {
        $test = new DeliveryModel();
    }
}