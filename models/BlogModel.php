<?php

 class BlogModel {

    private $con;

    public function __construct($con) {
             $this->con = $con;
    }

    public function generateBlogFileName($title) {

      $slug = preg_replace('/[^a-zA-Z0-9]+/', '-', strtolower($title));

      $randomNumber = rand(1000,9999);

      return $slug."-" .$randomNumber . ".php";
    }



    public function saveBlogDetails($title, $description, $image) {

       $imagePath = "assets/blog_images/" .basename($image['name']);
       move_uploaded_file($image['tmp_name'],$imagePath);

       $blogFileName = $this->generateBlogFileName($title);
       $blogFilePath = "../assets/blogs/" . $blogFileName;
       
       $stmt = $this->con->prepare("insert into blogs (blog_title, blog_description, blog_image, blog_filename) values (?,?,?,?)");
       $stmt->bind_param("ssss",$tite, $description, $imagePath, $blogFileName);
       $stmt->execute();

       return [
         "id" => $this->con->insert_id,
         "file" => $blogFileName
       ];    

    }


    public function saveBlogContent($id, $content) {
      $stmt= $this->con->prepare("select * from blogs where id = ?");
      $stmt->bind_param("i",$id);
      $stmt->execute();

      $result = $stmt->get_result();
      $blog = $result->fetch_assoc();


      if($blog) {
         $blogFilePath = $blog['blog_filename'];
         $htmlContent =  "<?php
         \$title = '{$blog['blog_title']}';
         \$description = '{$blog['blog_description']}';
         \$imagePath = '../{$blog['blog_image']}';

         ?>

         <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title><?php echo \$title; ?></title>
            </head>
            <body>
                <div class='single-post'>
                  <div class='feature-img'>
                    <img class='img-fluid' src='<?php echo \$imagePath; ?>' alt=''>
                  </div>
                  <div class='blog_details'>
                    <h2 style='color: #2d2d2d;'><?php echo \$title; ?></h2>
                    <ul class='blog-info-link mt-3 mb-4'>
                      <li><i class='fa fa-user'></i> Author</li>
                      <li><i class='fa fa-eye'></i> 03 Views</li>
                    </ul>
                    <p class='excert'><?php echo \$description; ?></p>
                    <div><?php echo \"$content\"; ?></div>
                  </div>
                </div>
            </body>
            </html> ";  
      }
    }
 }



?>