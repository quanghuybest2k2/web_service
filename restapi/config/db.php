<?php

// connect database based PDO (mysql, mysqli)

class db
{

    private $servername = "localhost";

    private $username = "root";

    private $password = "";

    public function connect()
    {

        $this->conn = null;

        try {

            $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=restapi_tracnghiem", $this->username, $this->password);

            // set the PDO error mode to exception

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected successfully";
        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
        }
    }
}



$db1 = new db();

$db1->connect();
