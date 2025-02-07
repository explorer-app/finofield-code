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
        <h2>Create New Service</h2>
        <form id="serviceForm">
            <div class="input-field">
                <label for="service-name">Service Name</label>
                <input type="text" id="service-name" placeholder="Enter service name" required>
            </div>
            <div class="input-field">
                <label for="brief-desc">Brief Description (Max 250 characters)</label>
                <textarea id="brief-desc" rows="3" placeholder="Enter brief description" maxlength="250" required></textarea>
            </div>
            <div class="input-field">
                <label for="detailed-desc">Detailed Description (Max 1000 words)</label>
                <textarea id="detailed-desc" rows="7" placeholder="Enter detailed description" required></textarea>
            </div>
            <div class="input-field">
                <label for="service-img">Upload Image</label>
                <input type="file" id="service-img" accept="image/*" required>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
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

        document.getElementById("serviceForm").addEventListener("submit", function(event) {
            event.preventDefault();
            alert("Service Submitted Successfully!");
            // You can send the data to the backend using Fetch API or AJAX here.
        });
    </script>
</body>
</html>
