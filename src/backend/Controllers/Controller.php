<?php

class Controller
{
    private $connection;
    private $dbObject;
    private $deliveryObject;
    private $deliveryStrategies = [];

    public function __construct()
    {
        $this->dbObject = new Database('mysql', 'mysql', 'root', 's123123');
        $this->connection = $this->dbObject->connect();

        $this->deliveryObject = new Delivery($this->connection);

        $this->deliveryStrategies[] = new FastDelivery('http://fast-delivery.com');
        $this->deliveryStrategies[] = new SlowDelivery('http://slow-delivery.com', 150);
    }

    public function databaseConnect()
    {
        if (!$this->connection) {
            return false;
        }

        return true;
    }

    public function getDeliveries()
    {
        return $this->deliveryObject->getAll();
    }

    public function insertData($source, $destination, $weight, $price, $error, $delivery_date)
    {
        return $this->deliveryObject->insertDelivery($source, $destination, $weight, $price, $error, $delivery_date);
    }

    public function calculateDeliveryCost($data)
    {
        $strategy = $this->deliveryStrategies[(int)$data['selectedStrategy']];
        $result = $strategy->calculateCost($data['source'], $data['destination'], $data['weight']);
        $resultDecode = json_decode($result, true);

        $inserted = $this->insertData($data['source'], $data['destination'], floatval($data['weight']),
            floatval($resultDecode['price']), $resultDecode['error'], $resultDecode['date']);

        if (!$inserted) {
            return false;
        }

        return true;
    }
}