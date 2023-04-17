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


}