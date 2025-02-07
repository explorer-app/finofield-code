<?php

include("../database/DbConnection.php");
include("../models/AdminModel.php");

session_start();

$db = new DbConnection();
$con = $db->getConnection();
$adminModel = new AdminModel($con);


$action = $_GET['action'];

if($action === 'admin-login'  && $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if(!$email || !$password) {
        header("location: ../login/index.php?error=Invalid email or password");
        exit();
    }


    $admin = $adminModel->getAdminByEmail($email);

    print_r($admin);
    echo $admin['admin_password'];

    if($admin && ($password === $admin['admin_password'])) {

    $_SESSION['id'] = $admin['admin_id'];   
    $_SESSION['email'] = $admin['admin_email'];

    header("location: ../admin/index.php");
    exit();
    } else {
        header("location: ../login/index.php?error=Invalid email or password");
        exit();
    }
}   else if($action === 'logout')  {
    session_unset();
    session_destroy();
    header("location: ../login/index.php");
}

?>
