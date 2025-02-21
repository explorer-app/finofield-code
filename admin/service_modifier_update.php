<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" href="../assets/admin_images/logo.png">
    <link rel="stylesheet" href="../assets/admin_css/style.css">
    <link rel="stylesheet" href="../assets/admin_css/services_info.css">

</head>
<body>
    <?php

    $service_id = $_GET['service_id'];
    
    if(!isset($service_id)) {
        header("location: ../index.php");
    }

    include("../models/ServiceModel.php");
    include("../database/DbConnection.php");

    $db = new DbConnection();
    $con = $db->getConnection();
    $serviceModel = new ServiceModel($con);

    $data = $serviceModel->getServiceById($service_id);


    include("./header.php"); ?>
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
        <h2>Create New Service</h2>
        <form id="serviceForm" action="../controllers/ServiceController.php?action=service_update" method="POST" enctype="multipart/form-data">

           <input type="hidden"  value="<?=  $data['service_id'];  ?>" name="service_id" />
            <div class="input-field">
                <label for="service-name">Service Name</label>
                <input type="text" name="service_name" id="service-name" value="<?= $data['service_name'];  ?>" placeholder="Enter service name" required>
            </div>
            <div class="input-field">
                <label for="brief-desc">Brief Description (Max 250 characters)</label>
                <textarea id="brief-desc" name="brief_description" rows="3" placeholder="Enter brief description" maxlength="250" required><?= $data['service_brief_description'];    ?></textarea>
            </div>
            <div class="input-field">
                <label for="detailed-desc">Detailed Description (Max 1000 words)</label>
                <textarea id="detailed-desc" name="detailed_description" rows="7" placeholder="Enter detailed description" required><?= $data['service_description'];   ?></textarea>
            </div>
            <div class="input-field">
                <label for="service-img">Upload Image</label>
                <input type="file" name="service_image" id="service-img" accept="image/*" required>
            </div><br>
            <div style="display:flex; justify-content: space-between;">
                <button type="submit" class="submit-btn">Update</button>
                <button class="submit-btn" style="background-color: red" onclick="deleteBlog()">Delete</button>
            </div>
            
        </form>
    </div>
    </section>
    <script src="../assets/admin_js/script.js" defer></script>

    <script>
        document.getElementById("detailed-desc").addEventListener("input", function() {
            const words = this.value.trim().split(/\s+/).filter(word => word.length > 0);
            if (words.length > 1000) {
                this.value = words.slice(0, 1000).join(" ");
                alert("Maximum 1000 words allowed.");
            }
        });

        // document.getElementById("serviceForm").addEventListener("submit", function(event) {
        //     event.preventDefault();
        //     alert("Service Submitted Successfully!");
        // });
    </script>
</body>
</html>
