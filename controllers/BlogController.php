<?php

include('../database/DbConnection.php');
include("../models/BlogModel.php");

$db = new DbConnection();
$con = $db->getConnection();
$blogModel = new BlogModel($con);

$action = $_GET['action'];

if($action === "blog_upload" && isset($_POST['blog_button'])) {

    $tile = filter_input(INPUT_POST,"blog_title");
    $description = filter_input(INPUT_POST, "blog_description");
    $image = $_FILEs["blog_image"];

    $result = $blogModel->saveBlogDetails($title, $description, $image);

    if($result) {
        header("location: ../admin/blog/index.php?id= " .$result['file']);
    } else {
        echo "Failed to save blog.";
    }

   


    
}



?>