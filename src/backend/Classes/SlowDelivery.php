<?php

class SlowDelivery implements DeliveryInterface
{
    private $baseUrl;
    private $basePrice;

    public function __construct($baseUrl, $basePrice)
    {
        $this->baseUrl = $baseUrl;
        $this->basePrice = $basePrice;
    }

    public function calculateCost($source, $destination, $weight)
    {
        $data = json_decode($this->sendRequest($this->baseUrl, [
            'sourceKladr' => $source,
            'targetKladr' => $destination,
            'weight' => $weight
        ]), true);

        $price = $this->basePrice * $data['coefficient'];
        $date = $data['date'];
        return json_encode(['price' => $price, 'date' => $date, 'error' => $data['error']]);
    }

    public function sendRequest($url, $data)
    {
        //emulate data receiving from service
        $coefficient = rand(0, 100) / 100;
        $date = date('Y-m-d');

        return json_encode(['coefficient' => $coefficient, 'date' => $date, 'error' => '']);
    }
}