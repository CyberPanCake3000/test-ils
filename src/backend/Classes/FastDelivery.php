<?php
require '../Interfaces/DeliveryInterface.php';
require 'Delivery.php';
class FastDelivery extends Delivery implements DeliveryInterface
{
    public function __construct($baseUrl) {
        $this->baseUrl = $baseUrl;
    }
    public function calculateCost($source, $destination, $weight)
    {
        $result = parent::sendRequest($this->baseUrl, [
            'sourceKladr' => $source,
            'targetKladr' => $destination,
            'weight' => $weight
        ]);

        // обработка результатов и формирование единого формата
        $price = $result['price'];
        $date = date('Y-m-d', strtotime("+{$result['period']} days"));

        return ['price' => $price, 'date' => $date, 'error' => $result['error']];
    }
}