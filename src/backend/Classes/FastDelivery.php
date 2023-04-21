<?php

class FastDelivery implements DeliveryInterface
{
    private $baseUrl;

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function calculateCost($source, $destination, $weight)
    {
        $data = json_decode($this->sendRequest($this->baseUrl, [
            'sourceKladr' => $source,
            'targetKladr' => $destination,
            'weight' => $weight
        ]), true);

        $price = $data['price'];
        $date = date('Y-m-d', strtotime("+{$data['period']} days"));

        return json_encode(['price' => $price, 'date' => $date, 'error' => $data['error']]);
    }

    public function sendRequest($url, $data)
    {
        //emulate data receiving from service
        $price = rand(0, 10000) / 100;
        $period = rand(3, 15);

        return json_encode(['price' => $price, 'period' => $period, 'error' => '']);
    }
}