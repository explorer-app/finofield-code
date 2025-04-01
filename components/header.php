<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("./database/DbConnection.php");
include("./models/ServiceModel.php");               
include("./models/BlogModel.php");               

$db = new DbConnection();
$con = $db->getConnection();

$serviceModel = new ServiceModel($con);
$blogModel = new BlogModel($con);
$data = $serviceModel->getAllServices();

?>

<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/loder.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- local storage -->
<script>
const API_URL = "http://localhost/finofield-code/controllers/SocialMedia.php";

async function fetchSocialLinks() {
  try {
    let response = await fetch(API_URL, {
      method: "GET", // Specify request type
      headers: {
        "Content-Type": "application/json", // Ensure JSON response
      },
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    let data = await response.json();

    if (data.success) {
      localStorage.setItem("whatsapp_link", data.data.whatsapp_link);
      localStorage.setItem("facebook_link", data.data.facebook_link);
      localStorage.setItem("twitter_link", data.data.twitter_link);
      localStorage.setItem("linkedin_link", data.data.linkedin_link);
    } else {
      console.error("No records found.");
    }
  } catch (error) {
    console.error("Error fetching API:", error);
  }
}

// Function to check if data exists in localStorage
function checkAndSetSocialLinks() {
  // Check if social links are available in localStorage
  const whatsapp = localStorage.getItem("whatsapp_link");
  const facebook = localStorage.getItem("facebook_link");
  const twitter = localStorage.getItem("twitter_link");
  const linkedin = localStorage.getItem("linkedin_link");

  if (whatsapp && facebook && twitter && linkedin) {
    // If data exists in localStorage, set the links in the HTML
    setSocialLinks();
  } else {
    // If data is missing, fetch it from the API and store it in localStorage
    fetchSocialLinks();
  }
}

// Function to set the social media links dynamically in the HTML
function setSocialLinks() {
  const whatsapp = localStorage.getItem("whatsapp_link");
  const facebook = localStorage.getItem("facebook_link");
  const twitter = localStorage.getItem("twitter_link");
  const linkedin = localStorage.getItem("linkedin_link");

  if (whatsapp) {
    document.getElementById("whatsapp-link").href = `https://wa.me/${whatsapp}`;
  }
  if (facebook) {
    document.getElementById("facebook-link").href = facebook;
  }
  if (twitter) {
    document.getElementById("twitter-link").href = twitter;
  }
  if (linkedin) {
    document.getElementById("linkedin-link").href = linkedin;
  }
}

// Call the checkAndSetSocialLinks function on page load
document.addEventListener("DOMContentLoaded", checkAndSetSocialLinks);


</script>
<!-- end local storage -->

<!-- Preloader Start-->
<header>
    <!-- Header Start -->
    <div class="header-area header_area">
        <div class="main-header">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="./"><img src="assets/img/logo/logo.png" class="logo-img" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-8">
                            <div class="header-left  d-flex f-right align-items-center">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="services.php">Services</a>
                                                <ul class="submenu">

                                                <?php

                                                       for($i=0;$i<sizeof($data);$i++) {
 
                                                         ?>
                                                      <li><a href="service.php?service_id=<?=  $data[$i]['service_id'];  ?>">  <?= $data[$i]['service_name'];?> </a></li>

                                                    <?php  } ?>
                                                    <!-- <li><a href="service.php">2. Tax & Regulatory Advisory</a></li>
                                                    <li><a href="service.php">3. Accounting / book-keeping</a></li>
                                                    <li><a href="service.php">4. IFRS conversion </a></li>
                                                    <li><a href="service.php">5. Representation </a></li>
                                                    <li><a href="service.php">6. Others </a></li> -->
                                                </ul>
                                            </li>
                                            <li><a href="blogs.php">Blogs</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- left Btn -->
                                <div class="header-right-btn f-right d-none d-lg-block  ml-30">
                                    <a onclick=whatsapp() target="_blank" class="header-btn">Let's Connect <i class="fa fa-phone"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>