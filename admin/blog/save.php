<?php

include("../../database/DbConnection.php");

$db = new DbConnection();
$con = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $blog_title = isset($_POST['blog_title']) ? $_POST['blog_title'] : "";
    $blog_description = isset($_POST['blog_description']) ? $_POST['blog_description'] : "";  // ✅ Fixed error
    $content = isset($_POST['content']) ? $_POST['content'] : "";

    $image = isset($_FILES['blog_image']) ? $_FILES['blog_image'] : null;  // ✅ Ensure $_FILES exists

    $imagePath = '';

    if(isset($_FILES['blog_image'])) {

      $uploadDir = '../../assets/blog_images/';

      $imageName = time().'_'.basename($_FILES['blog_image']['name']);
      $imagePath = $uploadDir.$imageName;

      //Move uploaded file
      if(!move_uploaded_file($_FILES['blog_image']['tmp_name'], $imagePath)) {
         echo "Image Upload Failed";
         exit;
      }
    }

    //store content in a file  (save file in assets/blogs)

    $fileName = time().'_'.$blog_title.'.html';
    $contentDir = '../../assets/blogs/';
    $contentFilePath = $contentDir.$fileName;



    if(!file_put_contents($contentFilePath,$content)) {
      echo "Error saving contents file";
      exit;
    }

    //insert data into database

    $sql = "insert into blogs(blog_title, blog_description, blog_image, blog_filename) values ('$blog_title', '$blog_description', '$imageName', '$fileName')";
    $q = mysqli_query($con, $sql);
    if($q) {
      echo "blog saved successfully";
    } else {
      echo "Error: " . mysqli_error($con);
    }

}

?>
