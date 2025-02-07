<?php

class AdminModel {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }


    public function getAdminByEmail($email) {
       
        $stmt = $this->con->prepare("select * from admin where admin_email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();

        $res = $stmt->get_result();

        return $res->fetch_assoc();
    }
}



?>