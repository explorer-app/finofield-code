<?php

if(isset($_GET['success'])) {
    $msg = $_GET['success'];
    echo "<script>alert('$msg');  </script>";
}

include("../models/ServiceModel.php");
include("../database/DbConnection.php");

 $db = new DbConnection();
 $con = $db->getConnection();
 $serviceModel = new ServiceModel($con);
 $data = $serviceModel->getAllServices();

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

                            <?php
                                for ($i = 0; $i < count($data); $i++) {
                                    echo "<span class='data-list'> 
                                         {$data[$i]['service_name']} 
                                              </span>";
                                 }
                         ?>
                           
                        </div>
    
                        <div class="data joined">
                            <span class="data-title">Created-Date</span>
                            <?php
                          
                          for($i=0;$i<sizeof($data);$i++) {
                            echo "<span class='data-list'>".$data[$i]['created_at']. "</span>";
                          }

                        ?>
                        </div>
    
                        <div class="data emails status">
                            <span class="data-title">Modify</span>
                            <?php
                            
                            for ($i = 0; $i < count($data); $i++) {
                                echo "<a href='./service_modifier_update.php?service_id={$data[$i]['service_id']}' class='data-list' style='display: inline-block;'>Click</a>";
                            }
                            


                         ?>
                        </div>
    
                        <div class="data status">
                            <span class="data-title">View</span>
                            <?php
                            
                            for($i=0;$i<sizeof($data);$i++) {
                                echo "<a target='_blank' href='../blog.php?blog_view_id={$data[$i]['service_id']}' class='data-list' style='display: inline-block;'>view</a>";
                            }


                         ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/admin_js/script.js" defer></script>
</body>

</html>