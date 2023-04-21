<?php

class Delivery
{
    private $tableName = 'deliveries';
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insertDelivery($source, $destination, $weight, $price, $error, $delivery_date)
    {
        $sql = "INSERT INTO $this->tableName (source, destination, weight, price, error, delivery_date)
                    VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->connection, $sql);
        mysqli_stmt_bind_param($stmt, 'ssddss', $source, $destination, $weight, $price, $error, $delivery_date);

        if (!mysqli_stmt_execute($stmt)) {
            var_dump(mysqli_stmt_error($stmt));
            die();
        }

        return mysqli_stmt_execute($stmt);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->tableName";
        $query = mysqli_query($this->connection, $sql);
        $result = [];

        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }
}