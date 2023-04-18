<?php

require '../Interfaces/DeliveryInterface.php';
require 'Delivery.php';
class SlowDelivery extends Delivery implements DeliveryInterface
{
    private $basePrice;

    public function __construct($baseUrl, $basePrice) {
        $this->baseUrl = $baseUrl;
        $this->basePrice = $basePrice;
    }

    public function calculateCost($source, $destination, $weight) {
        $result = parent::sendRequest($this->baseUrl, [
            'sourceKladr' => $source,
            'targetKladr' => $destination,
            'weight' => $weight
        ]);

        // обработка результатов и формирование единого формата
        $price = $this->basePrice * $result['coefficient'];
        $date = $result['date'];

        return ['price' => $price, 'date' => $date, 'error' => $result['error']];
    }
}