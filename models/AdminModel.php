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

    public function sendMessage($data) {
         
        $stmt = $this->con->prepare("insert into contact (contact_name, contact_email, contact_number, contact_message) values (?,?,?,?)"); 

        if(!$stmt) {
            die("Error in statement preparation: " .$this->con->error);
        }

        $stmt->bind_param("ssss",$data['name'], $data['email'], $data['mobile'], $data['message']);
        $stmt->execute();

        if($stmt->error) {
            die('Error in statement execution: ' . $stmt->error);
        }

        $stmt->close();
    }
}



?>