<?php

include("./database/DbConnection.php");
include("./models/ServiceModel.php");

$db = new DbConnection();
$con = $db->getConnection();

$serviceModel = new ServiceModel($con);

$data = $serviceModel->getLimitService();

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
                                    <a href="#" class="header-btn">Make an Appointment <i class="fa fa-phone"></i></a>
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