<footer>
        <div class="footer-wrapper section-bg2 pl-100" >
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-35">
                                        <a href="index.php"><img class="logo-img" src="assets/img/logo/logo2_footer.png" style="width: 300px;" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>Offers wide range of services especially to 
                                            startups who is looking forward to doing business in India.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- social -->
                                    <div class="footer-social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <!--<a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>-->
                                        <!--<a href="#"><i class="fab fa-pinterest-p"></i></a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Our Services</h4>
                                    <ul>
                                        <?php

                                            for($i=0;$i<sizeof($data);$i++) {
                                            ?>
                                                <li><a href="service.php?service_id=<?=  $data[$i]['service_id'];  ?>">  <?= $data[$i]['service_name'];?> </a></li>
                                        <?php  } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Company</h4>
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="services.php">Services</a>
                                        <li><a href="blogs.php">Blogs</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contact us</h4>
                                    <ul>
                                        <li><a href="mailto:finofield@finofield.com">finofield@finofield.com</a></li>
                                        <li><a href="https://www.google.com/maps?q=28.5130558013916,77.41084289550781&z=17&hl=en" target="_blank">M2 Floor 24, Alphathum Tower-B, Janpath Marg Sector 90, Noida (201305) INDIA</a></li>
                                        <li class="number"><a href="tel:+919958188067">(+91) 99581 88067</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom area -->
            <div class="footer-bottom-area">
                <div class="container-fluid">
                    <div class="footer-border">
                        <div class="row align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right">
                                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;
                                        <script>document.write(new Date().getFullYear());</script> All rights reserved |
                                        This Website is made by <i class="fa fa-heart" aria-hidden="true"></i> by <a
                                            href="https://explorer-app.github.io/" target="_blank">Explorer</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </div>
    </footer>