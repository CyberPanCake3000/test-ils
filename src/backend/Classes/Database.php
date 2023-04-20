<?php
class Database
{
    private $DB_HOST = '';
    private $DB_DATABASE = '';
    private $DB_USER = '';
    private $DB_PASSWORD = '';

    public function __construct($host, $database, $user, $password)
    {
        $this->DB_HOST = $host;
        $this->DB_DATABASE = $database;
        $this->DB_USER = $user;
        $this->DB_PASSWORD = $password;

    }

    public function connect()
    {
        $conn = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD, $this->DB_DATABASE);

        if (!$conn) {
            return false;
        }

        return $conn;
    }
}