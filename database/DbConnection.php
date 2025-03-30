<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

 class DbConnection {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "finofield";

    public function getConnection() {
        $con = mysqli_connect($this->servername, $this->username, $this->password, $this->database);   

        if($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
            exit();
        } else {
        }

        return $con;
    }
 }




?>