<?php

 class DbConnection {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "finofield";

    public function getConnection() {
        $con = mysqli_connect($this->$servername, $this->username, $this->password, $this->database);   

        if($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
            exit();
        } else {
            echo "connection successfull";
        }

        return $con;
    }
 }




?>