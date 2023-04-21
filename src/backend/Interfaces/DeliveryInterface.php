<?php

interface DeliveryInterface
{
    public function calculateCost($source, $destination, $weight);
}