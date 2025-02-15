<?php

include("../database/DbConnection.php");
include("../models/BlogModel.php");

$db = new DbConnection();
$con = $db->getConnection();

$blogModel = new BlogModel($con);
$data = $blogModel->getBlogs();

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
    <section class="panel blogs" id="panel">
        <link rel="stylesheet" href="../assets/admin_css/blogs.css">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here . . .">
            </div>
            <img src="./images/profile.jpg" alt="">
        </div>
        <div class="blogs-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <a class="a box box2" href="./blog_preview.php">
                            <i class="uil uil-plus"></i>
                            <span class="text">Create Blog</span>
                            <!-- <span class="number">11,216</span> -->
                    </a>
                    
            </div>
            <div class="activity">
                <div class="search-tools">
                    <div class="title">
                        
                        <i class="uil uil-users-alt"></i>
                        <span class="text">All Avilable Blogs</span>
                    </div>
                    <div class="search">
                        <div class="input">
                            <input type="text" placeholder="Search blogs . . .">
                            <button><i class="uil uil-search"></i></button>
                        </div>
                        <div>
                            Short BY: <select name="Catagory" id="">
                                <option value="">Newest</option>
                                <option value="">Older</option>
                                <option value="">Alphabet A-Z</option>
                                <option value="">Alphabet Z-A</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Blogs Name</span>

                        <?php
                                for ($i = 0; $i < count($data); $i++) {
                                    echo "<span class='data-list'> 
                                        <img src='../assets/blog_images/{$data[$i]['blog_image']}' alt=''> 
                                         {$data[$i]['blog_title']} 
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
                                echo "<a href='blog/modify.php?blog_id={$data[$i]['blog_id']}' class='data-list' style='display: inline-block;'>Click</a>";
                            }
                            


                         ?>
                        
                    </div>

                    <div class="data status">
                        <span class="data-title">View</span>
                        <?php
                            
                            for($i=0;$i<sizeof($data);$i++) {
                                echo "<span class='data-list'>view</span>";
                            }


                         ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>

    </style>


    <script src="../assets/admin_js/script.js" defer></script>
</body>

</html>