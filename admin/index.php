<?php

// include("../models/UserModel.php");
//  include("../controllers/DatabaseController.php");

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
    <section class="panel dashboard">
        <link rel="stylesheet" href="../assets/admin_css/deshboard.css">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here . . .">
            </div>
            <img src="../assets/admin_images/profile.jpg" alt="">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-eye"></i>
                        <span class="text">Total Views</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-user"></i>
                        <span class="text">Total Clients</span>
                        <span class="number">11,216</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-question"></i>
                        <span class="text">Total Enquiry</span>
                        <span class="number">5,110</span>
                    </div>
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
                <div class="title">
                    <i class="uil uil-clock-two"></i>
                    <span class="text">Recent Enquiry</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <!-- dummy data -->
                        <span class='data-list users-name'>Arjun Tripathi</span>
                        <span class='data-list users-name'>Arjun Tripathi</span>
                        <span class='data-list users-name'>Arjun Tripathi</span>
                        <span class='data-list users-name'>Arjun Tripathi</span>
                        <span class='data-list users-name'>Arjun Tripathi</span>
                        <?php
                         
                        //  for($i=0;$i<sizeof($data);$i++) {
                        //     echo "<span class='data-list users-name'>". $data[$i]['name'] . "</span>";
                        //  }
                          ?> 
                    </div>

                    <div class="data emails">
                        <span class="data-title">Email</span>
                        <!-- dummy data -->
                        <span class='data-list users-email'>arjun@gmail.com</span>
                        <span class='data-list users-email'>arjun@gmail.com</span>
                        <span class='data-list users-email'>arjun@gmail.com</span>
                        <span class='data-list users-email'>arjun@gmail.com</span>
                        <span class='data-list users-email'>arjun@gmail.com</span>
                        <?php
                         
                        //  for($i=0;$i<sizeof($data);$i++) {
                        //     echo "<span class='data-list users-email'>". $data[$i]['email'] . "</span>";
                        //  }
                          ?> 
                    </div>

                    <div class="data mobiles">
                        <span class="data-title">Phone</span>
                        <!-- dummy data -->
                        <span class='data-list users-phone'>+9179879879879878</span>
                        <span class='data-list users-phone'>+9179879879879878</span>
                        <span class='data-list users-phone'>+9179879879879878</span>
                        <span class='data-list users-phone'>+9179879879879878</span>
                        <span class='data-list users-phone'>+9179879879879878</span>
                        <?php
                         
                        //  for($i=0;$i<sizeof($data);$i++) {
                        //     echo "<span class='data-list users-phone'>". $data[$i]['phone'] . "</span>";
                        //  }
                          ?> 
                    </div>

                    <div class="data inquiry" style="display:none">
                        <span class="data-title">inquiry</span>
                        <!-- dummy data -->
                        <span class='data-list users-inquiry'>dummy message</span>
                        <span class='data-list users-inquiry'>dummy message</span>
                        <span class='data-list users-inquiry'>dummy message</span>
                        <span class='data-list users-inquiry'>dummy message</span>
                        <span class='data-list users-inquiry'>dummy message</span>
                        <?php
                         
                        //  for($i=0;$i<sizeof($data);$i++) {
                        //     echo "<span class='data-list users-inquiry'>". $data[$i]['message'] . "</span>";
                        //  }
                          ?> 
                    </div>

                    <div class="data joined">
                        <span class="data-title">Date</span>
                        <!-- dummy data -->
                        <span class='data-list date'>2024-9-01</span>
                        <span class='data-list date'>2024-9-01</span>
                        <span class='data-list date'>2024-9-01</span>
                        <span class='data-list date'>2024-9-01</span>
                        <span class='data-list date'>2024-9-01</span>
                        <?php
                         
                        //  for($i=0;$i<sizeof($data);$i++) {
                        //     $str = explode(" ",$data[$i]['date']);
                        //     $date = DateTime::createFromFormat('Y-m-d',$str[0]);
                        //     $newdate = $date->format('d/m/y');
                        //     echo "<span class='data-list date'>". $newdate . "</span>";
                        //  }
                          ?> 
                    </div>

                    <div class="data status">
                        <span class="data-title">Action</span>
                        <!-- dummy data -->
                        <span class='data-list view-btn' value=''> View </span>
                        <span class='data-list view-btn' value=''> View </span>
                        <span class='data-list view-btn' value=''> View </span>
                        <span class='data-list view-btn' value=''> View </span>
                        <span class='data-list view-btn' value=''> View </span>
                        <?php
                            // for($i=0;$i<sizeof($data);$i++) {
                            //     echo "<span class='data-list view-btn' value='".$data[$i]['id']."'> View </span>";
                            // }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                    //    if(sizeof($data)==0)
                    //     echo "<br><center> <span class='data-list'> No Request Found </span> </center>";

                       ?>
        </div>
    </section>

    <style>
        
    </style>


    <script src="../assets/admin_js/script.js" defer></script>
</body>

</html>