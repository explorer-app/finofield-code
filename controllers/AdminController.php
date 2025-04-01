<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

    else if ($action === 'contact_process' && $_SERVER['REQUEST_METHOD'] === 'POST') {
         
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, "mobile", FILTER_SANITIZE_STRING);
    
        if (!$name || !$email || !$message || !$phone) {
            $_SESSION['error'] = "Invalid input. Please fill all fields correctly.";
            header("location: ../index.php");
            exit;
        }
    
        // Try inserting into database
        $result = $adminModel->sendMessage([
            'name' => $name,
            'email' => $email,
            'mobile' => $phone,
            'message' => $message
        ]);
    
        if ($result) {
            $_SESSION['success'] = "Successfully submitted request.";
        } else {
            $_SESSION['error'] = "Error submitting request. Please try again.";
        }
    
        header("location: ../index.php");
        exit;
    }
      else if($action=="setting" && $_SERVER['REQUEST_METHOD']) {

        $facebook = $_POST['facebook'];
        $linkedin = $_POST['linkedin'];
        $twitter = $_POST['twitter'];
        $whatsapp = $_POST['whatsapp'];

        if(!$facebook || !$linkedin || !$twitter || !$whatsaap) {
            header("location: ../admin/setting.php?error=please fil all the fields");
        }



        $result = $adminModel->addSettings(['facebook' => $facebook, 'linkedin' => $linkedin, 'twitter' => $linkedin, 'whatsapp' => $whatsapp, 'id' => 1]);

        if($result) {
            header("location: ../admin/setting.php?message=data save successfully");
        } else {
            header("location: ../admin/setting.php?message=something went wrong");
        }
      }
    

?>
