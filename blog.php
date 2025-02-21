<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Consulting | Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon.ico">

  <!-- CSS here -->
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="./assets/css/slicknav.css">
  <link rel="stylesheet" href="./assets/css/flaticon.css">
  <link rel="stylesheet" href="./assets/css/progressbar_barfiller.css">
  <link rel="stylesheet" href="./assets/css/gijgo.css">
  <link rel="stylesheet" href="./assets/css/animate.min.css">
  <link rel="stylesheet" href="./assets/css/animated-headline.css">
  <link rel="stylesheet" href="./assets/css/magnific-popup.css">
  <link rel="stylesheet" href="./assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="./assets/css/themify-icons.css">
  <link rel="stylesheet" href="./assets/css/slick.css">
  <link rel="stylesheet" href="./assets/css/nice-select.css">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<?php 
     $id = $_GET['blog_view_id'];

     if(!isset($id)) {
        header("location: index.php");
     }

     include('./components/header.php');

     $blog = $blogModel->getBlogById($id);
?>

  <main>
    <!--? slider Area Start-->
    <div class="slider-area slider-area2 slider-height2 position-relative" data-background="./assets/img/hero/hero2.png">
      <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider">
          <div class="slider-cap-wrapper">
            <div class="hero-caption">
              <h1 data-animation="fadeInLeft" data-delay=".4s">Blog</h1>
              <!-- breadcrumb Start-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Blogs</a></li>
                  <li class="breadcrumb-item"><a href="#"><?= $blog['blog_title'];   ?></a></li>
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
    <!-- slider Area End-->
    <!--? Blog Area Start -->
    <section class="blog_area single-post-area section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 posts-list">
          <div class="feature-img">
    <!-- <img class="img-fluid" src="./assets/img/blog/single_blog_1.png" alt=""> -->
  </div>
  <div class="blog_details">
    <h1 style="color: #2d2d2d; font-size: 50px; font-weight: bolder; word-wrarp: wrap"><?= $blog['blog_title']; ?></h1>
    <br>
    <img class="img-fluid" src="<?= 'assets/blog_images/' . $blog['blog_image']; ?>" alt="" data-animation="fadeInRight" data-transition-duration="5s">
    <ul class="blog-info-link mt-3 mb-4">
      <li><i class="fa fa-user"></i> Binod Gupta</li>
      <li><i class="fa fa-eye"></i> <?= $id?> Views</li>
    </ul>
    <?php include('assets/blogs/' . $blog['blog_filename']); ?>
</div>


            <!-- <div class="comments-area">
              <h4>05 Comments</h4>
              <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                  <div class="user justify-content-between d-flex">
                    <div class="thumb">
                      <img src="./assets/img/blog/comment_1.png" alt="">
                    </div>
                    <div class="desc">
                      <p class="comment">
                        Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                        Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                      </p>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <h5>
                            <a href="#">Emilly Blunt</a>
                          </h5>
                          <p class="date">December 4, 2017 at 3:12 pm </p>
                        </div>
                        <div class="reply-btn">
                          <a href="#" class="btn-reply text-uppercase">reply</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                  <div class="user justify-content-between d-flex">
                    <div class="thumb">
                      <img src="./assets/img/blog/comment_2.png" alt="">
                    </div>
                    <div class="desc">
                      <p class="comment">
                        Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                        Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                      </p>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <h5>
                            <a href="#">Emilly Blunt</a>
                          </h5>
                          <p class="date">December 4, 2017 at 3:12 pm </p>
                        </div>
                        <div class="reply-btn">
                          <a href="#" class="btn-reply text-uppercase">reply</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                  <div class="user justify-content-between d-flex">
                    <div class="thumb">
                      <img src="./assets/img/blog/comment_3.png" alt="">
                    </div>
                    <div class="desc">
                      <p class="comment">
                        Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                        Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                      </p>
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <h5>
                            <a href="#">Emilly Blunt</a>
                          </h5>
                          <p class="date">December 4, 2017 at 3:12 pm </p>
                        </div>
                        <div class="reply-btn">
                          <a href="#" class="btn-reply text-uppercase">reply</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

          </div>
          <div class="col-lg-4">
            <div class="blog_right_sidebar">
              <aside class="single_sidebar_widget search_widget">
                <form action="./blogs.php" method="get">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <input type="text" name="query" value="<?=$query?>" class="form-control" placeholder='Search Keyword'
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                      <div class="input-group-append">
                        <button class="btns" type="submit"><i class="ti-search"></i></button>
                      </div>
                    </div>
                  </div>
                  <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                    type="submit">Search</button>
                </form>
              </aside>

              <!-- <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title" style="color: #2d2d2d;">Recent Post</h3>
                <div class="media post_item">
                  <img src="./assets/img/post/post_1.png" alt="post">
                  <div class="media-body">
                    <a href="blog_details.html">
                      <h3 style="color: #2d2d2d;">From life was you fish...</h3>
                    </a>
                    <p>January 12, 2019</p>
                  </div>
                </div>
                <div class="media post_item">
                  <img src="./assets/img/post/post_2.png" alt="post">
                  <div class="media-body">
                    <a href="blog_details.html">
                      <h3 style="color: #2d2d2d;">The Amazing Hubble</h3>
                    </a>
                    <p>02 Hours ago</p>
                  </div>
                </div>
                <div class="media post_item">
                  <img src="./assets/img/post/post_3.png" alt="post">
                  <div class="media-body">
                    <a href="blog_details.html">
                      <h3 style="color: #2d2d2d;">Astronomy Or Astrology</h3>
                    </a>
                    <p>03 Hours ago</p>
                  </div>
                </div>
                <div class="media post_item">
                  <img src="./assets/img/post/post_4.png" alt="post">
                  <div class="media-body">
                    <a href="blog_details.html">
                      <h3 style="color: #2d2d2d;">Asteroids telescope</h3>
                    </a>
                    <p>01 Hours ago</p>
                  </div>
                </div>
              </aside> -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Area End -->
  </main>
  <?php include('./components/footer.php')?>

  <!-- Scroll Up -->
  <div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
  </div>

  <!-- JS here -->

  <script src="././assets/js/vendor/modernizr-3.5.0.min.js"></script>
  <!-- Jquery, Popper, Bootstrap -->
  <script src="././assets/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="././assets/js/popper.min.js"></script>
  <script src="././assets/js/bootstrap.min.js"></script>
  <!-- Jquery Mobile Menu -->
  <script src="././assets/js/jquery.slicknav.min.js"></script>

  <!-- Jquery Slick , Owl-Carousel Plugins -->
  <script src="././assets/js/owl.carousel.min.js"></script>
  <script src="././assets/js/slick.min.js"></script>
  <!-- One Page, Animated-HeadLin -->
  <script src="././assets/js/wow.min.js"></script>
  <script src="././assets/js/animated.headline.js"></script>
  <script src="././assets/js/jquery.magnific-popup.js"></script>

  <!-- Date Picker -->
  <script src="././assets/js/gijgo.min.js"></script>
  <!-- Nice-select, sticky -->
  <script src="././assets/js/jquery.nice-select.min.js"></script>
  <script src="././assets/js/jquery.sticky.js"></script>

  <!-- counter , waypoint,Hover Direction -->
  <script src="././assets/js/jquery.counterup.min.js"></script>
  <script src="././assets/js/waypoints.min.js"></script>
  <script src="././assets/js/jquery.countdown.min.js"></script>
  <script src="././assets/js/hover-direction-snake.min.js"></script>

  <!-- contact js -->
  <script src="././assets/js/contact.js"></script>
  <script src="././assets/js/jquery.form.js"></script>
  <script src="././assets/js/jquery.validate.min.js"></script>
  <script src="././assets/js/mail-script.js"></script>
  <script src="././assets/js/jquery.ajaxchimp.min.js"></script>

  <!-- Jquery Plugins, main Jquery -->
  <script src="././assets/js/plugins.js"></script>
  <script src="././assets/js/main.js"></script>

</body>

</html>