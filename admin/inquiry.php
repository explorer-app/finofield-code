<?php

include("../models/AdminModel.php");
include("../database/DbConnection.php");

$db = new DbConnection();
$con = $db->getConnection();
$adminModel = new AdminModel($con);

$data = $adminModel->getClientRequest();

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

        // if(isset($_SESSION['delete'])) {
        //     $msg = $_SESSION['delete'];  
            
        //       echo "<script>alert('$msg');  </script>";
        //       unset($_SESSION['delete']);
        //   }
    ?>
    <section class="panel inquiry">
        <link rel="stylesheet" href="../assets/admin_css/inquiry.css">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here . . .">
            </div>
            <img src="../assets/admin_images/profile.jpg" alt="">
        </div>
        <div class="inquiry-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-question"></i>
                    <span class="text">Enquiries</span>
                </div>
            </div>
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div id="userData">
                    <!-- Content will be dynamically filled in by JavaScript -->
                    </div>
                </div>
            </div>
            <div class="activity">
                <div class="search-tools">
                    <div class="title">
                        <i class="uil uil-calender"></i>
                        <span class="text">All Days</span>
                    </div>
                    <div class="search">
                        <div style="color: var(--text-color);">
                            Today: <input type="date" id="myDateInput" value = '<?= date("Y-m-d"); ?>' max = '<?= date("Y-m-d"); ?>' >
                        </div>
                    </div>
                </div>

                <div class="activity-data">
                  
                    <div class="data names">   
                        <span class="data-title">Name</span>
                        <!-- dummy data -->
                        <!-- <span class='data-list users-name'>dummy data</span> -->
                        <?php
                         
                         for($i=0;$i<sizeof($data);$i++) {
                            echo "<span class='data-list users-name'>". $data[$i]['contact_name'] . "</span>";
                         }
                          ?>     
                    </div>

                    <div class="data emails">
                        <span class="data-title">Email</span>
                        <!-- dummy data -->
                        <!-- <span class='data-list users-email'>dummy@gmail.com</span> -->
                         <?php
                         
                         for($i=0;$i<sizeof($data);$i++) {
                            echo "<span class='data-list users-email'>". $data[$i]['contact_email'] . "</span>";
                         }
                          ?> 
                    </div>

                    <div class="data mobiles">
                        <span class="data-title">Phone</span>
                        <!-- dummy data -->
                         <!-- <span class='data-list users-mobile'>1234567890</span> -->
                         <?php
                         
                         for($i=0;$i<sizeof($data);$i++) {
                            echo "<span class='data-list users-phone'>". $data[$i]['contact_number'] . "</span>";
                         }
                          ?> 
                    </div>

                    <div class="data inquiry" style="display:none">
                        <span class="data-title">inquiry</span>
                        <!-- dummy data -->
                        <!-- <span class='data-list users-inquiry'>dummy inqiry"</span> -->
                        <?php
                         
                         for($i=0;$i<sizeof($data);$i++) {
                            echo "<span class='data-list users-inquiry'>". $data[$i]['contact_message'] . "</span>";
                         }
                          ?> 
                    </div>

                    <div class="data joined">
                        <span class="data-title">Date</span>
                        <!-- dummy data -->
                         <!-- <span class='data-list users-joined'>2022-01-01</span> -->
                        <?php
                         
                         for($i=0;$i<sizeof($data);$i++) {
                            $str = explode(" ",$data[$i]['date']);
                            $date = DateTime::createFromFormat('Y-m-d',$str[0]);
                            $newdate = $date->format('d/m/y');
                            echo "<span class='data-list date'>". $newdate . "</span>";
                         }
                          ?> 
                    </div>

                    <div class="data status">
                        <span class="data-title">Action</span>
                        <!-- dummy data -->
                        <!-- <span class='data-list view-btn' value=''>view </span> -->
                        <?php
                            for($i=0;$i<sizeof($data);$i++) {
                                echo "<span class='data-list view-btn' value='".$data[$i]['contact_id']."'> View </span>";
                            }
                             
                        ?>
                    </div>
                   
                </div>
                <?php
                       if(sizeof($data)==0)
                        echo "<br><center> <span class='data-list'> No Request Found </span> </center>";

                       ?>
            </div>
    </section>

    <script src="../assets/admin_js/script.js" defer></script>
</body>

</html>