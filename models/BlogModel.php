<?php

 class BlogModel {

    private $con;

    public function __construct($con) {
             $this->con = $con;
    }

    public function generateBlogFileName($title) {

      $slug = preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($title));

      $randomNumber = rand(1000,9999);

      return $slug."-" .$randomNumber . ".html";
    }

    public function saveBlogDetails($title, $description, $image) {

       $imagePath = "../assets/blog_images/" .basename($image['name']);
       move_uploaded_file($image['tmp_name'],$imagePath);

       $blogFileName = $this->generateBlogFileName($title);
       $blogFilePath = "../assets/blogs/" . $blogFileName;
       
       $stmt = $this->con->prepare("insert into blog(title, description, image) values (  )")
      

    }
 }



?>