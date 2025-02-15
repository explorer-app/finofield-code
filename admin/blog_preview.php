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
            <form action="../admin/blog/index.php" method="post" enctype="multipart/form-data">
    <div class="form-container">
        <h2>Blog Form</h2>
        
        <div class="input">
            <label>Cover Image:</label>
            <input type="file" id="cover-img" name="blog_image" accept="image/*">
        </div>
        <div class="input">
            <label>Title:</label>
            <input type="text" id="title" placeholder="Enter blog title" name="blog_title">
        </div>
        <div class="input">
            <label>Description:</label>
            <textarea id="description" rows="4" placeholder="Enter blog description (max 250 characters)" name="blog_description"></textarea>
            <span class="description-limit">Max 250 characters allowed!</span>
        </div>
        
        <button class="create-btn" name="blog_button" type="submit">Create</button>
    </div>
</form>


            <!-- Blog Preview -->
            <div class="preview-container">
                <h2>Preview</h2>
                <div class="blog-preview">
                    <div class="date-badge" id="date-badge"></div>
                    <img src="https://payu.in/blog/wp-content/uploads/2019/01/Blog-Cover.gif" id="preview-img">
                    <div class="content">
                        <h1 id="preview-title">Your Blog Title</h1>
                        <p id="preview-description">Your Blog Description</p>
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
    </section>
    <script src="../assets/admin_js/script.js" defer></script>
    <script>
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