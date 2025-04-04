<?php 
    error_reporting(E_WARNING|E_NOTICE);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include("../database/DbConnection.php");
    include("../models/BlogModel.php");

    if(!isset($_GET['blog_id'])) {
        header("location: ../../index.php");
    }

    $db = new DbConnection();
    $con = $db->getConnection();

    $blogModel = new BlogModel($con);
    $blog = $blogModel->getBlogById($_GET['blog_id']);

    $blog_id = $blog['blog_id'];
    $blog_title = $blog['blog_title'];
    $blog_description = $blog['blog_description'];
    $blog_image = "../assets/blog_images/".$blog['blog_image'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../assets/admin_css/blog_preview.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin home</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" href="../assets/admin_images/logo.png">
    <link rel="stylesheet" href="../assets/admin_css/style.css">
</head>

<body>
    <?php include("./header.php"); ?>
    <section class="panel">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here . . .">
            </div>
            <img src="../assets/admin_images/profile.jpg" alt="">
        </div>

        <div class="container">
            <!-- Blog Form -->
            <form action="./blog/modify.php" method="post" enctype="multipart/form-data">
    <div class="form-container">
        <h2>Blog Form</h2>
        
        <div class="input">
            <label>Cover Image:</label>
            <input type="file" id="cover-img" name="blog_image" accept="image/*">
        </div>
        <div class="input">
            <label>Title:</label>
            <input type="text" id="title" placeholder="Enter blog title" name="blog_title" value="<?= htmlspecialchars($blog_title) ?>" />
        </div>
        <div class="input">
            <label >Description:</label>
            <textarea id="description" rows="4" placeholder="Enter blog description (max 250 characters)" name="blog_description"><?= htmlspecialchars($blog_description) ?></textarea>
            <span class="description-limit">Max 250 characters allowed!</span>
        </div>
        
        <button class="create-btn" name="blog_id" value="<?= $blog_id?>" type="submit">Update blog</button>
    </div>
</form>



            <!-- Blog Preview -->
            <div class="preview-container">
                <h2>Preview</h2>
                <div class="blog-preview">
                    <div class="date-badge" id="date-badge"></div>
                    <img src="<?= $blog_image?>" id="preview-img">
                    <div class="content">
                        <h1 id="preview-title"><?= htmlspecialchars($blog_title) ?></h1>
                        <p id="preview-description"><?= htmlspecialchars($blog_description) ?></p>
                    </div>
                    <div class="info">
                        <div class="name">
                            <i class="fa fa-user"> Name</i>
                        </div> |
                        <div class="view">
                            <i class="fa fa-eye"> 100</i>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <button class="delete-btn" onclick="deleteBlog()">Delete blog</button>
    </section>
    <script src="../assets/admin_js/script.js" defer></script>
    <script>
        function deleteBlog() {
            fetch('./blog/manage.php', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `blog_id=<?= $blog_id ?>`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Blog deleted successfully!");
                    window.location.href = "./blogs.php"; // Redirect to blogs page
                } else {
                    alert("Failed to delete the blog: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred while deleting the blog.");
            });
        }

        // Set current date
        function getCurrentDate() {
            const today = new Date();
            const options = { day: 'numeric', month: 'short' };
            return today.toLocaleDateString('en-GB', options); // Example: "6 Feb"
        }
        document.getElementById("date-badge").textContent = getCurrentDate();

        // Title update
        document.getElementById("title").addEventListener("input", function () {
            document.getElementById("preview-title").textContent = this.value || "Your Blog Title";
        });

        // Description update with 250 character limit
        document.getElementById("description").addEventListener("input", function () {
            let descText = this.value;
            if (descText.length > 250) {
                this.value = descText.substring(0, 250);
                document.querySelector(".description-limit").style.display = "block";
            } else {
                document.querySelector(".description-limit").style.display = "none";
            }
            document.getElementById("preview-description").textContent = this.value || "Your Blog Description";
        });

        // Image update
        document.getElementById("cover-img").addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById("preview-img").src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById("preview-img").src = "https://payu.in/blog/wp-content/uploads/2019/01/Blog-Cover.gif";
            }
        });
    </script>
</body>