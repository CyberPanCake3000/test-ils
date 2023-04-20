<?php

class Controller
{
    private $connection;
    private $dbObject;
    private $deliveryObject;
    public function __construct()
    {
        $this->dbObject = new Database('mysql', 'mysql', 'root', 's123123');
        $this->deliveryObject = new Delivery($this->connection);
    }
    public function databaseConnect()
    {
        $this->connection = $this->dbObject->connect();

        if (!$this->connection) {
            return false;
        };

        return true;
    }
    public function getDeliveries()
    {
        return $this->deliveryObject->getAll();
    }

    public function insertData()
    {
        return 'hello world!';
    }
}