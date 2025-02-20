<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FinoField | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- ? Preloader Start -->

    <?php 
     $id = $_GET['service_id'];

     if(!isset($id)) {
        header("location: index.php");
     }

     include("database/DbConnection.php");
     include("models/ServiceModel.php");

     $db = new DbConnection();
     $con = $db->getConnection();

     $serviceModel = new ServiceModel($con);

     $data = $serviceModel->getServiceById($id);
    
    include('./components/header.php')?>
    <main>
        <!--? slider Area Start-->
        <div class="slider-area slider-area2 slider-height2 position-relative"
            data-background="assets/img/hero/hero2.png">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider">
                    <div class="slider-cap-wrapper">
                        <div class="hero-caption">
                            <h1 data-animation="fadeInLeft" data-delay=".4s">Service</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Services</a></li>
                                    <li class="breadcrumb-item"><a href="#">Service</a></li>
                                </ol>
                            </nav>
                        </div>

                        <!-- breadcrumb End -->
                        <div class="hero-img">
                            <img src="assets/img/hero/h1_hero2.png" alt="" data-animation="fadeInRight"
                                data-transition-duration="5s">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- About Area End-->
        <!--! About Area Start 02-->
        <div class="about-area2">
            <!-- left Contents -->
            <div class="about-details2">
                <div class="right-caption">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-50">
                        <!-- <h2>Our<br>Philosophy</h2> -->
                    </div>
                    <br>
                    <div class="about-more">
                        <p><?=  $data['service_brief_description'];  ?></p>
                        <p class="pera-bottom"><?=  $data['service_description'];   ?></p>

                    </div>
                </div>
            </div>
            <br>
            <!--Right Contents  -->
            <div class="col-12 col-md-6 text-center">
                <div class="image">
                    <img src="./assets/service_images/<?=  $data['service_image'];  ?>" alt="" class="img-fluid w-100">
                </div>
            </div>
        </div>
        
        <section class="wantToWork-area section-bg2" data-background="assets/img/gallery/section_bg01.png">
            <div class="container">
                <div class="wants-wrapper w-padding2">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>Need a consulting services?</h2>
                                <p>Launching a startup? Let us handle the hassles while you focus on growth!</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <a href="#" class="btn w-btn wantToWork-btn mr-20">Make an Appointment</a>
                            <a href="#" class="btn2 w-btn wantToWork-btn"><i class="fas fa-phone"></i> (89) 673
                                378-309</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Want To work End -->
    </main>

    <?php include('./components/footer.php')?>

    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>