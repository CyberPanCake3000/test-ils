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
        $query = mysqli_query( $this->connection, $sql );
        $result = [];

        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }
}