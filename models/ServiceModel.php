<?php


class ServiceModel {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }


    public function addService($data) {

        $uploadDir = "../assets/service_images/";


        $image = $data['image'];

        if ($image) {
            $imageName = time() . '_' . basename($image['name']);
            $imagePath = $uploadDir . $imageName;
            if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
                echo "Image Upload Failed";
                exit;
            }
        }

        $stmt = $this->con->prepare("insert into services(service_name, service_description, service_brief_description, service_image) values (?,?,?,?)");

        if(!$stmt) {
            die("Error in statement preparation: " .$this->con->error);
        }

        $stmt->bind_param("ssss",$data['name'], $data['detailed_description'], $data['brief_description'], $imageName);
        $stmt->execute();

        if($stmt->error) {
            die('Error in statement execution: ' . $stmt->error);
        }

        $stmt->close();
    }


    public function getAllServices() {

        
        $stmt = $this->con->prepare("select * from services");
        $stmt->execute();

        $result = $stmt->get_result();
        $dataArray = array();

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $dataArray[] = $row;
            }
        }

        $stmt->close();

        return $dataArray;
    }

    public function getServiceById($id) {

        $stmt = $this->con->prepare("select * from services where service_id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $res = $stmt->get_result();

        return $res->fetch_assoc();
    }

    public function updateService($data) {

        $uploadDir = "../assets/service_images/";


        $image = $data['image'];

        if ($image) {
            $imageName = time() . '_' . basename($image['name']);
            $imagePath = $uploadDir . $imageName;
            if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
                echo "Image Upload Failed";
                exit;
            }
        }

        $stmt = $this->con->prepare("UPDATE services 
                                SET service_name = ?, 
                                    service_description = ?, 
                                    service_brief_description = ?, 
                                    service_image = ? 
                                WHERE service_id = ?");

    if(!$stmt) {
        die("Error in statement preparation: " . $this->con->error);
    }

    // Correct parameter binding
    $stmt->bind_param("ssssi", 
        $data['name'], 
        $data['detailed_description'], 
        $data['brief_description'], 
        $imageName, 
        $data['service_id']
    );

    $stmt->execute();

    if($stmt->error) {
        die('Error in statement execution: ' . $stmt->error);
    }

    $stmt->close();
    }
}



?>