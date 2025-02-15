<?php

 class BlogModel {

    private $con;

    public function __construct($con) {
             $this->con = $con;
    }

   public function getBlogs() {

       $stmt = $this->con->prepare("select * from blogs");
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

   public function getBlogById($id) {
    $stmt = $this->con->prepare("SELECT * FROM blogs WHERE blog_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    // Fetch the result
    $result = $stmt->get_result();
    
    // Check if a row exists and fetch it as an associative array
    if ($result->num_rows > 0) {
        return $result->fetch_assoc(); // Return the single blog row
    } else {
        return null; // Return null if no blog is found
    }
}

   
 }



?>