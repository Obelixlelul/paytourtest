<?php

namespace Core;

use \PDO;
use PDOException;

class Database
{
    protected $pdo = null;
    private $db_name = 'paytour';
    private $db_user = 'root';
    private $db_pass = 'root';
    private $db_host = 'localhost';

    protected function connect() {
        try {
            $dsn = "mysql:dbname=".$this->db_name.";host=".$this->db_host;
            $pdo = new PDO($dsn, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}


