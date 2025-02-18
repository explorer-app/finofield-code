<?php
include("../../database/DbConnection.php");

$db = new DbConnection();
$con = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_id = isset($_POST['blog_id']) ? $_POST['blog_id'] : null;
    $blog_title = isset($_POST['blog_title']) ? $_POST['blog_title'] : "";
    $blog_description = isset($_POST['blog_description']) ? $_POST['blog_description'] : "";
    $content = isset($_POST['content']) ? $_POST['content'] : "";
    $image = isset($_FILES['blog_image']) ? $_FILES['blog_image'] : null;

    $imageName = "";
    $uploadDir = '../../assets/blog_images/';
    $contentDir = '../../assets/blogs/';

    // Handle image upload if provided
    if ($image) {
        $imageName = time() . '_' . basename($image['name']);
        $imagePath = $uploadDir . $imageName;
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            echo "Image Upload Failed";
            exit;
        }
    }

    // Save content to an HTML file
    $fileName = time() . '_' . $blog_title . '.html';
    $contentFilePath = $contentDir . $fileName;
    if (!file_put_contents($contentFilePath, $content)) {
        echo "Error saving content file";
        exit;
    }

    // Insert or update the blog based on whether `blog_id` is provided
    if ($blog_id) {
        // Update blog
        $sql = "UPDATE blogs SET blog_title = '$blog_title', blog_description = '$blog_description'";
        if ($imageName) {
            $sql .= ", blog_image = '$imageName'";
        }
        $sql .= ", blog_filename = '$fileName' WHERE blog_id = '$blog_id'";

        if (mysqli_query($con, $sql)) {
            echo "Blog updated successfully";
        } else {
            echo "Error updating blog: " . mysqli_error($con);
        }
    } else {
        // Insert new blog
        $sql = "INSERT INTO blogs (blog_title, blog_description, blog_image, blog_filename) VALUES ('$blog_title', '$blog_description', '$imageName', '$fileName')";
        if (mysqli_query($con, $sql)) {
            echo "Blog saved successfully";
        } else {
            echo "Error saving blog: " . mysqli_error($con);
        }
    }
}else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_id = isset($_POST['blog_id']) ? $_POST['blog_id'] : null;
    $blog_title = isset($_POST['blog_title']) ? $_POST['blog_title'] : "";
    $blog_description = isset($_POST['blog_description']) ? $_POST['blog_description'] : "";
    $content = isset($_POST['content']) ? $_POST['content'] : "";
    $image = isset($_FILES['blog_image']) ? $_FILES['blog_image'] : null;

    $imageName = "";
    $uploadDir = '../../assets/blog_images/';
    $contentDir = '../../assets/blogs/';

    // Handle image upload if provided
    if ($image) {
        $imageName = time() . '_' . basename($image['name']);
        $imagePath = $uploadDir . $imageName;
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            echo "Image Upload Failed";
            exit;
        }
    }

    // Save content to an HTML file
    $fileName = time() . '_' . $blog_title . '.html';
    $contentFilePath = $contentDir . $fileName;
    if (!file_put_contents($contentFilePath, $content)) {
        echo "Error saving content file";
        exit;
    }

    // Insert or update the blog based on whether `blog_id` is provided
    if ($blog_id) {
        // Update blog
        $sql = "UPDATE blogs SET blog_title = '$blog_title', blog_description = '$blog_description'";
        if ($imageName) {
            $sql .= ", blog_image = '$imageName'";
        }
        $sql .= ", blog_filename = '$fileName' WHERE blog_id = '$blog_id'";

        if (mysqli_query($con, $sql)) {
            echo "Blog updated successfully";
        } else {
            echo "Error updating blog: " . mysqli_error($con);
        }
    } else {
        // Insert new blog
        $sql = "INSERT INTO blogs (blog_title, blog_description, blog_image, blog_filename) VALUES ('$blog_title', '$blog_description', '$imageName', '$fileName')";
        if (mysqli_query($con, $sql)) {
            echo "Blog saved successfully";
        } else {
            echo "Error saving blog: " . mysqli_error($con);
        }
    }
}
?>
