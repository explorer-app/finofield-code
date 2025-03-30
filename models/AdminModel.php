<?php

class AdminModel {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getAdminByEmail($email) {
    $stmt = $this->con->prepare("SELECT * FROM admin WHERE admin_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    // Get metadata to determine the columns
    $meta = $stmt->result_metadata();
    $fields = [];
    $row = [];

    while ($field = $meta->fetch_field()) {
        $fields[$field->name] = null;
        $row[] = &$fields[$field->name];
    }

    // Bind results
    call_user_func_array([$stmt, 'bind_result'], $row);

    $data = null;
    if ($stmt->fetch()) {
        $data = array_map(fn($val) => $val, $fields);
    }

    $stmt->close();
    return $data;
}


    public function sendMessage($data) {
        $stmt = $this->con->prepare("INSERT INTO contact (contact_name, contact_email, contact_number, contact_message) VALUES (?,?,?,?)"); 

        if (!$stmt) {
            die("Error in statement preparation: " . $this->con->error);
        }

        $stmt->bind_param("ssss", $data['name'], $data['email'], $data['mobile'], $data['message']);
        $stmt->execute();

        if ($stmt->error) {
            die('Error in statement execution: ' . $stmt->error);
        }

        $stmt->close();
    }

    public function getClientRequest() {
        $stmt = $this->con->prepare("SELECT * FROM contact");
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

  public function addSettings($data) {
    $stmt = $this->con->prepare("UPDATE setting SET whatsapp_link = ?, facebook_link = ?, twitter_link = ?, linkedin_link = ? WHERE id = ?");
    
    if (!$stmt) {
        die("Error in statement preparation: " . $this->con->error);
    }

    $stmt->bind_param("ssssi", $data['whatsapp'], $data['facebook'], $data['twitter'], $data['linkedin'], $data['id']);
    $result = $stmt->execute();

    if ($stmt->error) {
        die('Error in statement execution: ' . $stmt->error);
    }

    $stmt->close();
    return $result;
}


    public function getUrl() {
        $stmt = $this->con->prepare("SELECT * FROM setting");
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
}

?>
