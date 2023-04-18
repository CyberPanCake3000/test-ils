<?php

class Delivery
{
    private $tableName = 'deliveries';
    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public function insert($data){
        $sql = "INSERT INTO $this->tableName ()";
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->tableName";

        return mysqli_fetch_array(mysqli_query($this->connection, $sql), MYSQLI_ASSOC);
    }
}