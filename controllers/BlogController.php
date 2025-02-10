<?php

include('../database/DbConnection.php');
include("../models/BlogModel.php");

$action = $_GET['action'];

if($action === "blog_upload") {

    $tile = filter_input(INPUT_POST,"blog_title");
    $description = filter_input()
}



?>