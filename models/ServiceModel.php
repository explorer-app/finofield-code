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

        $stmt = $this->con->prepare("insert into services(service_name, service_description, service_brief_description, service_image, data_link) values (?,?,?,?,?)");

        if(!$stmt) {
            die("Error in statement preparation: " .$this->con->error);
        }

        $stmt->bind_param("sssss",$data['name'], $data['detailed_description'], $data['brief_description'], $imageName, $data['data_link']);
        $stmt->execute();

        if($stmt->error) {
            die('Error in statement execution: ' . $stmt->error);
        }

        $stmt->close();
    }

    public function getAllServices() {
        $stmt = $this->con->prepare("select * from services");
        $stmt->execute();

        $meta = $stmt->result_metadata();
        $fields = [];
        $row = [];
        while ($field = $meta->fetch_field()) {
            $fields[$field->name] = null;
            $row[] = &$fields[$field->name];
        }

        call_user_func_array([$stmt, 'bind_result'], $row);

        $dataArray = [];
        while ($stmt->fetch()) {
            $dataArray[] = array_map(fn($val) => $val, $fields);
        }

        $stmt->close();
        return $dataArray;
    }

    public function getServiceById($id) {
        $stmt = $this->con->prepare("select * from services where service_id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $meta = $stmt->result_metadata();
        $fields = [];
        $row = [];
        while ($field = $meta->fetch_field()) {
            $fields[$field->name] = null;
            $row[] = &$fields[$field->name];
        }

        call_user_func_array([$stmt, 'bind_result'], $row);

        $data = null;
        if ($stmt->fetch()) {
            $data = array_map(fn($val) => $val, $fields);
        }

        $stmt->close();
        return $data;
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
                                    service_image = ?,
                                    data_link = ?
                                WHERE service_id = ?");

        if(!$stmt) {
            die("Error in statement preparation: " . $this->con->error);
        }

        $stmt->bind_param("sssssi", 
            $data['name'], 
            $data['detailed_description'], 
            $data['brief_description'], 
            $imageName, 
            $data['data_link'],
            $data['service_id']
        );

        $stmt->execute();

        if($stmt->error) {
            die('Error in statement execution: ' . $stmt->error);
        }

        $stmt->close();
    }

    public function getLimitService() {
        $stmt = $this->con->prepare("SELECT * FROM services LIMIT 5");
        $stmt->execute();

        $meta = $stmt->result_metadata();
        $fields = [];
        $row = [];
        while ($field = $meta->fetch_field()) {
            $fields[$field->name] = null;
            $row[] = &$fields[$field->name];
        }

        call_user_func_array([$stmt, 'bind_result'], $row);

        $dataArray = [];
        while ($stmt->fetch()) {
            $dataArray[] = array_map(fn($val) => $val, $fields);
        }

        $stmt->close();
        return $dataArray;
    }

    public function deleteService($id) {
        $stmt = $this->con->prepare("delete from services where service_id = ?");
        $stmt->bind_param("i",$id);

        $result = $stmt->execute();

        return $result;
    }
}

?>
