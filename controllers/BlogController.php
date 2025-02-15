<?php

include('../database/DbConnection.php');
include("../models/BlogModel.php");

$db = new DbConnection();
$con = $db->getConnection();
$blogModel = new BlogModel($con);

session_start();

$action = $_GET['action'];

if ($action === "blog_upload" && isset($_POST['blog_button'])) {
    $title = filter_input(INPUT_POST, "blog_title");
    $description = filter_input(INPUT_POST, "blog_description");

    if (isset($_FILES["blog_image"]) && $_FILES["blog_image"]["error"] === UPLOAD_ERR_OK) {
        // Call the saveBlogDetails method with the full $_FILES["blog_image"]

        $data = [$title,$description,$_FILES['blog_image']];
        $_SESSION['data'] =$data;
      //  $result = $blogModel->saveBlogDetails($title, $description, $_FILES["blog_image"]);

        // if ($result) {
        //     header("Location: ../admin/blog/index.php?id=" . $result['file']);
        // } else {
        //     echo "Failed to save blog.";
        // }
    } else {
        echo "No image uploaded or there was an error with the file.";
    }
}





?>