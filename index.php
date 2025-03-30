<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FinoField</title>
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
    <?php include('./components/header.php');

    
    ?>

    <main>
        <!--? slider Area Start-->
        <div class="slider-area  slider-height position-relative" data-background="assets/img/hero/h1_hero.png">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider">
                    <div class="slider-cap-wrapper">
                        <div class="hero-caption">
                            <span>Best Service</span>
                            <h1 data-animation="fadeInLeft" data-delay=".4s">Business Consulting</h1>
                            <p data-animation="fadeInLeft" data-delay=".6s">Offers wide range of services especially to 
                            startups who is looking forward to doing business in India.</p>
                            <!-- Hero Btn -->
                            <a href="./services.php" class="btn" data-animation="fadeInLeft" data-delay=".9s">Explore Services</a>
                        </div>
                        <div class="hero-img">
                            <img src="assets/img/hero/h1_hero1.png" alt="" data-animation="fadeInRight"
                                data-transition-duration="5s">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Video icon -->
            <!--<div class="video-icon">-->
            <!--    <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i-->
            <!--            class="fas fa-play"></i></a>-->
            <!--</div>-->
        </div>
        
        <div style="max-width: 100%; padding: 30px; display: flex; justify-content: center; align-items: center;">
            <img src="./assets/img/hero/LCCI-Logo.png" alt="" 
                style="max-width: 90%; height: auto; max-height: 200px;">
        </div>
        <!-- slider Area End-->
        <!--? Services Area Start -->
        <section class="services-section section-padding30 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10 col-md-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-70">
                            <span>Our Service</span>
                            <h2>We bring ideas by combining years of experiences of our team.</h2>
                        </div>
                    </div>
                </div>
                <div class="services-active">

                <?php

                         for($i=0;$i<sizeof($data);$i++) {
                           ?>
                    <div class="single-services section-over1 text-center">
                        <div class="services-img">
                        
                            <img src="./assets/service_images/<?= $data[$i]['service_image'];  ?>" alt="" />
                            <div class="services-caption">
                                <h3>
                                    <a href="service.php?service_id=<?= $data[$i]['service_id']; ?>">
                                        <?= $data[$i]['service_name']; ?>
                                    </a>
                                </h3>
                                <p><?= $data[$i]['service_brief_description']; ?></p>
                                <a href="service.php?service_id=<?= $data[$i]['service_id']; ?>" class="btn btn3">view</a>

                            </div>
                        </div>
                    </div>
            <?php  }  ?>

                    <!-- <div class="single-services section-over1 text-center">
                        <div class="services-img">
                            <img src="assets/img/gallery/taxr.png" alt="">
                            <div class="services-caption">
                                <h3><a href="#">Tax & Regulatory Advisory & Compliance</a></h3>
                                <a href="#" class="btn btn3">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-services section-over1 text-center">
                        <div class="services-img">
                            <img src="assets/img/gallery/abk.png" alt="">
                            <div class="services-caption">
                                <h3><a href="#">Accounting/book-keeping & Financial reporting</a></h3>
                                <a href="#" class="btn btn3">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-services section-over1 text-center">
                        <div class="services-img">
                            <img src="assets/img/gallery/ifrs.png" alt="">
                            <div class="services-caption">
                                <h3><a href="#">IFRS conversion</a></h3>
                                <a href="#" class="btn btn3">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-services section-over1 text-center">
                        <div class="services-img">
                            <img src="assets/img/gallery/rep2.png" alt="">
                                <div class="services-caption">
                                    <h3><a href="#">Representation before various regulators including tax authorities</a></h3>
                                    <a href="#" class="btn btn3">view</a>
                                </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!--Services Area End -->
        <!--! About Area Start 01 -->
        <section class="about-area fix">
            <!--Right Contents  -->
            <div class="about-img">

            </div>
            <!-- left Contents -->
            <div class="about-details">
                <div class="right-caption">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-50">
                        <h2>Our<br>Philosophy</h2>
                    </div>
                    <div class="about-more">
                        <p>FinoField aims to provide high-quality business advisory services in a time-efficient manner, 
                            ensuring that startups and multinational companies can focus on their core business 
                            while the firm handles compliance, financial, and regulatory matters.</p>
                        <p class="pera-bottom">
                            FinoField provides cost-effective business setup solutions while ensuring compliance 
                            with Indian tax and regulatory frameworks. We offer expert guidance on business structuring,
                            funding, and financial reporting, 
                            along with end-to-end support for operations and government policy updates.</p>
                        <div class="footer-tittles">
                            <p>CEO, FinoField</p>
                            <!-- <h2>Binod Gupta</h2> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End-->
        <!--! About Area Start 02-->
        <div class="about-area2">
            <!-- left Contents -->
            <div class="about-details2">
            <div class="right-caption2">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-50">
                        <h2>Why We ?</h2>
                    </div>
                    <!-- collapse-wrapper -->
                    <div class="collapse-wrapper">
                        <div class="accordion" id="accordionExample">
                            <!-- single-one -->
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <a href="#" class="btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            What makes FinoField different from other business consultants?</a>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        FinoField offers a one-stop solution for all essential business services, 
                                        eliminating the need to hire multiple consultants and reducing overall costs.
                                    </div>
                                </div>
                            </div>
                            <!-- single-two -->
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Why is a single-service provider better than multiple consultants?</a>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Managing different service providers can be expensive and complex. 
                                        FinoField simplifies the process by handling everything under one roof, 
                                        ensuring seamless operations.
                                    </div>
                                </div>
                            </div>
                            <!-- single-three -->
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <a href="#" class="btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            How does FinoField help startups entering the Indian market?</a>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Startups often struggle with high consulting costs and operational challenges. 
                                        FinoField acts as an extended team, providing expert guidance and cost-effective solutions.
                                    </div>
                                </div>
                            </div>
                            <!-- single-four -->
                            <div class="card">
                                <div class="card-header" id="headingfouree">
                                    <h2 class="mb-0">
                                        <a href="#" class="btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseFoure" aria-expanded="false"
                                            aria-controls="collapseFoure">
                                            Is FinoField suitable for established businesses as well?</a>
                                    </h2>
                                </div>
                                <div id="collapseFoure" class="collapse" aria-labelledby="headingfouree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Yes! While startups benefit the most, 
                                        established businesses can also leverage our 
                                        expertise to streamline operations and optimize costs.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Right Contents  -->
            <div class="about-img2">
                <!--<div class="info-man2">-->
                <!--    <div class="head-cap2">-->
                <!--        <img src="assets/img/icon/quality.svg" alt="">-->
                <!--        <h3>900+</h3>-->
                <!--    </div>-->
                <!--    <p>Interdum nulla, ut commodo<br>diam libero vitae erat.</p>-->
                <!--</div>-->
                <!--<div class="info-man2 info-man3">-->
                <!--    <div class="head-cap2">-->
                <!--        <img src="assets/img/icon/heart.svg" alt="">-->
                <!--        <h3>95%</h3>-->
                <!--    </div>-->
                <!--    <p>Transforming Businesses,<br> One Solution at a Time</p>-->
                <!--</div>-->
            </div>
        </div>
        <!-- About Area End-->
        <!--? Testimonial Area Start -->

        <!-- <section class="testimonial-area testimonial-padding fix" data-background="assets/img/gallery/section_bg03.png">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class=" col-lg-9">
                        <div class="about-caption">
                            
                            <div class="h1-testimonial-active dot-style">
                                
                                <div class="single-testimonial position-relative">
                                    <div class="testimonial-caption">
                                        <img src="assets/img/icon/quotes-sign.png" alt="" class="quotes-sign">
                                        <p>Brook presents your services with flexible, convenient and cdpose layouts.
                                            You can select your favorite layouts & elements for cular ts with unlimited
                                            ustomization possibilities. Pixel-perfect replica;ition of thei designers
                                            ijtls intended csents your se.</p>
                                    </div>
                                    
                                    <div class="testimonial-founder d-flex align-items-center">
                                        <div class="founder-img">
                                            <img src="assets/img/icon/testimonial.png" alt="">
                                        </div>
                                        <div class="founder-text">
                                            <span>Robart Brown</span>
                                            <p>Creative designer at Colorlib</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="single-testimonial position-relative">
                                    <div class="testimonial-caption">
                                        <img src="assets/img/icon/quotes-sign.png" alt="" class="quotes-sign">
                                        <p>Brook presents your services with flexible, convenient and cdpose layouts.
                                            You can select your favorite layouts & elements for cular ts with unlimited
                                            ustomization possibilities. Pixel-perfect replica;ition of thei designers
                                            ijtls intended csents your se.</p>
                                    </div>
                                    
                                    <div class="testimonial-founder d-flex align-items-center">
                                        <div class="founder-img">
                                            <img src="assets/img/icon/testimonial.png" alt="">
                                        </div>
                                        <div class="founder-text">
                                            <span>Robart Brown</span>
                                            <p>Creative designer at Colorlib</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!--? Testimonial Area End -->
        <!-- Home Blog Start -->

        <!-- <section class="home-blog section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="cl-xl-7 col-lg-8 col-md-10">
                        
                        <div class="section-tittle text-center mb-70">
                            <span>Case studies</span>
                            <h2>Some great stuffs we have done</h2>
                        </div>
                    </div>
                </div>
                <div class="blog-active">
                    
                    <div class="single-blogs">
                        <div class="blog-img">
                            <img src="assets/img/gallery/blogs1.png" alt="">
                        </div>
                        <div class="blogs-cap">
                            <h5><a href="#">Starts the automated process.</a></h5>
                            <p>The automated process starts as soon as your clothes go into the machine.</p>
                        </div>
                        <div class="stickers">
                            <span>Urban</span>
                        </div>
                    </div>
                    
                    <div class="single-blogs">
                        <div class="blog-img">
                            <img src="assets/img/gallery/blogs2.png" alt="">
                        </div>
                        <div class="blogs-cap">
                            <h5><a href="#">Starts the automated process.</a></h5>
                            <p>The automated process starts as soon as your clothes go into the machine.</p>
                        </div>
                        <div class="stickers">
                            <span>Urban</span>
                        </div>
                    </div>
                    
                    <div class="single-blogs">
                        <div class="blog-img">
                            <img src="assets/img/gallery/blogs3.png" alt="">
                        </div>
                        <div class="blogs-cap">
                            <h5><a href="#">Starts the automated process.</a></h5>
                            <p>The automated process starts as soon as your clothes go into the machine.</p>
                        </div>
                        <div class="stickers">
                            <span>Urban</span>
                        </div>
                    </div>
                    
                    <div class="single-blogs">
                        <div class="blog-img">
                            <img src="assets/img/gallery/blogs2.png" alt="">
                        </div>
                        <div class="blogs-cap">
                            <h5><a href="#">Starts the automated process.</a></h5>
                            <p>The automated process starts as soon as your clothes go into the machine.</p>
                        </div>
                        <div class="stickers">
                            <span>Urban</span>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Home Blog End -->
        <!--? Office environment  Start-->
        <section class="office-environments section-bg2 section-padding40"
            data-background="assets/img/gallery/section_bg02.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8">
                        <div class="office-pera">
                            <div class="section-tittle">
                                <h2 class="mb-30">Office <br>Environment</h2>
                                <p>FinoField Business Solutions LLP combines professionalism with efficiency, 
                                    offering expert-driven business advisory, tax compliance, and regulatory services. 
                                    With a team of management graduates, chartered accountants, and company secretaries, 
                                    they ensure precision, compliance, and strategic problem-solving.</p>

                                <p>At the same time, FinoField fosters a dynamic, 
                                    startup-friendly culture that values collaboration, 
                                    innovation, and teamwork. 
                                    Employees work closely with clients, 
                                    delivering personalized solutions with professionalism and integrity. 
                                    This blend of structure and flexibility creates a productive, 
                                    growth-oriented workspace.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Office environment  End-->
        <!--? Team Ara Start -->

        <section class="team-area section-padding40">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="cl-xl-7 col-lg-8 col-md-10">
                        
                        <div class="section-tittle text-center mb-70">
                            <!-- <span>Experts</span> -->
                            <h2>Our Clients</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="assets/img/gallery/team1.png" alt="">
                                <div class="team-social">
                                    <ul>
                                        <li><a href="https://www.facebook.com/ExpoTOPACK/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://x.com/topackexpo" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://topack.in/" target="_blank"><i class="fas fa-globe"></i></a></li>
                                        <li><a href="https://www.instagram.com/topackexpo/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="team-caption">
                                <h3><a href="#">Topack</a></h3>
                            </div> -->
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="assets/img/gallery/team2.png" alt="">
                                <div class="team-social">
                                    <ul>
                                        <!-- <li><a href="#"><i class="fab fa-facebook-f"></i></a></li> -->
                                        <li><a href="https://www.linkedin.com/company/realitymine" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                        <!-- <li><a href="#"><i class="fas fa-globe"></i></a></li> -->
                                        <!-- <li><a href="#"><i class="fab fa-instagram"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="team-caption">
                                <h3><a href="#">Realty Mine</a></h3>
                                <p>Senior business consultant</p>
                            </div> -->
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="assets/img/gallery/team3.png" alt="">
                                <div class="team-social">
                                    <ul>
                                        <li><a href="http://www.facebook.com/CABI.development" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/CABI_News" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.cabi.org/" target="_blank"><i class="fas fa-globe"></i></a></li>
                                        <li><a href="https://www.linkedin.com/company/cabi" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="team-caption">
                                <h3><a href="#">Michel Frade</a></h3>
                                <p>Senior business consultant</p>
                            </div> -->
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="assets/img/gallery/team4.png" alt="">
                                <div class="team-social">
                                    <ul>
                                        <li><a href="https://www.facebook.com/cmacgm" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://x.com/cmacgm" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.cma-cgm.com/" target="_blank"><i class="fas fa-globe"></i></a></li>
                                        <li><a href="https://www.linkedin.com/company/cma-cgm" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="team-caption">
                                <h3><a href="#">Kalisha Milano</a></h3>
                                <p>Senior business consultant</p>
                            </div> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Ara End -->
        <!--? Want To work -->
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
                            <a href="#" class="btn w-btn wantToWork-btn mr-20">Let's Connect</a>
                            <a href="#" class="btn2 w-btn wantToWork-btn"><i class="fas fa-phone"></i> (+91) 99581 88067</a>
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