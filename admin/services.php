<?php

// if(isset($_GET['upload'])) {
//     $msg = $_GET['upload'];
//     echo "<script>alert('$msg');  </script>";
// }

// include("../models/UserModel.php");
// include("../controllers/DatabaseController.php");

//  $db = new DatabaseController();
//  $con = $db->getConnection();
//  $usermodel = new UserModel($con);
//  $data = $usermodel->getData();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- It is a Awasome Font Link -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin home</title>
    <link rel="icon" href="../assets/admin_images/logo.png">
    <link rel="stylesheet" href="../assets/admin_css/style.css">
</head>

<body>
    <?php 
        include("./header.php"); 
    ?>
    <section class="panel services">
        <link rel="stylesheet" href="../assets/admin_css/services.css">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here . . .">
            </div>
            <img src="../assets/admin_images/profile.jpg" alt="">
        </div>
        <div class="services-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-puzzle-piece"></i>
                    <span class="text">Services</span>
                </div>
                <div class="boxes">
                    <a href="./service_modifier.php" class="a box box1" value="living-room">
                        <i class="uil uil-plus"></i>
                        <span class="text">Create Services</span>
                    </a>
                </div>
            </div>
            <div class="activity">
                <div class="search-tools">
                    <div class="title">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">All Avilable services</span>
                    </div>
                    <div class="activity-data">
                        <div class="data names">
                            <span class="data-title">Services Name</span>
                            <span class="data-list"> <img src="./images/profile.jpg" alt=""> Arjun Tripathi</span>
                            <span class="data-list"> <img src="./images/profile.jpg" alt=""> Rahul Durgapal</span>
                            <span class="data-list"> <img src="./images/profile.jpg" alt=""> Sagar Chuhan</span>
                            <span class="data-list"> <img src="./images/profile.jpg" alt=""> Niket Narayan</span>
                        </div>
    
                        <div class="data joined">
                            <span class="data-title">Created-Date</span>
                            <span class="data-list">12-dec-2023</span>
                            <span class="data-list">11-dec-2023</span>
                            <span class="data-list">10-dec-2023</span>
                            <span class="data-list">09-dec-2023</span>
                        </div>
    
                        <div class="data emails status">
                            <span class="data-title">Modify</span>
                            <span class="data-list">Click</span>
                            <span class="data-list">Click</span>
                            <span class="data-list">Click</span>
                            <span class="data-list">Click</span>
                        </div>
    
                        <div class="data status">
                            <span class="data-title">View</span>
                            <span class="data-list">View</span>
                            <span class="data-list">View</span>
                            <span class="data-list">View</span>
                            <span class="data-list">View</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/admin_js/script.js" defer></script>
</body>

</html>