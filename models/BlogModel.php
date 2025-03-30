<?php

class BlogModel {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getBlogs() {
        $stmt = $this->con->prepare("SELECT * FROM blogs");
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

    public function getBlogsByName($name) {
        $name = "%" . $name . "%"; // Add wildcards for the LIKE query
        $stmt = $this->con->prepare("SELECT * FROM blogs WHERE blog_title LIKE ?");
        $stmt->bind_param("s", $name);
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

    public function getBlogById($id) {
        $stmt = $this->con->prepare("SELECT * FROM blogs WHERE blog_id = ?");
        $stmt->bind_param("i", $id);
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
