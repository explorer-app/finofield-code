<?php  session_start();
// if(!isset($_SESSION['id']))
//  header("location: ../index.php");

        include("./preloader.php"); 
// ?>
<nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../assets/admin_images/logo.png" alt="">
            </div>

            <span class="logo_name">Finofield</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li>
                    <a href="./index.php" id="">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="./inquiry.php" id="">
                        <i class="uil uil-question"></i>
                        <span class="link-name">Inquiry</span>
                    </a>
                </li>

                <li>
                    <a href="./blogs.php" id="">
                        <i class="uil uil-file"></i>
                        <span class="link-name">Blogs</span>
                    </a>
                </li>
                <li>
                    <a href="./services.php" id="">
                        <i class="uil uil-puzzle-piece"></i>
                        <span class="link-name">Services</span>
                    </a>
                </li>
            </ul>

            <ul class="logout-mode">
                <li>
                    <a href="../controllers/AppController.php?action=logout" id="">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a>
                </li>

                <li>
                    <a href="./setting.php" id="">
                        <i class="uil uil-setting"></i>
                        <span class="link-name">Edit Profile</span>
                    </a>
                </li>

                <li class="mode">
                    <a href="#" id="" onclick="document.querySelector('.mode-toggle').click()">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>