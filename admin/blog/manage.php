<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
header("Access-Control-Allow-Origin: *");  // Allow requests from any origin
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
include("../../database/DbConnection.php");


$db = new DbConnection();
$con = $db->getConnection();

// Handle POST: Create a new blog
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     error_log("POST request received");
//     $blog_id = isset($_POST['blog_id']) ? intval($_POST['blog_id']) : 0; // Check if updating
//     $blog_title = isset($_POST['blog_title']) ? $_POST['blog_title'] : "";
//     $blog_description = isset($_POST['blog_description']) ? $_POST['blog_description'] : "";
//     $content = isset($_POST['content']) ? $_POST['content'] : "";

//     $imageName = "";
//     $uploadDir = '../../assets/blog_images/';
//     $contentDir = '../../assets/blogs/';

//     // Handle image upload if provided
//     if (isset($_FILES['blog_image']) && $_FILES['blog_image']['error'] === UPLOAD_ERR_OK) {
//         $imageName = time() . '_' . basename($_FILES['blog_image']['name']);
//         $imagePath = $uploadDir . $imageName;
//         if (!move_uploaded_file($_FILES['blog_image']['tmp_name'], $imagePath)) {
//             echo json_encode(["success" => false, "message" => "Image upload failed"]);
//             exit;
//         }
//     }

//     // Save content to an HTML file
//     $fileName = time() . '_' . $blog_title . '.html';
//     $contentFilePath = $contentDir . $fileName;
//     if (!file_put_contents($contentFilePath, $content)) {
//         echo json_encode(["success" => false, "message" => "Error saving content file"]);
//         exit;
//     }

//     if ($blog_id > 0) {
//         // Update an existing blog
//         $sql = "UPDATE blogs SET blog_title = '$blog_title', blog_description = '$blog_description', blog_filename = '$fileName'";
//         if ($imageName) {
//             $sql .= ", blog_image = '$imageName'";
//         }
//         $sql .= " WHERE blog_id = '$blog_id'";

//         if (mysqli_query($con, $sql)) {
//             echo json_encode(["success" => true, "message" => "Blog updated successfully"]);
//         } else {
//             echo json_encode(["success" => false, "message" => "Error updating blog: " . mysqli_error($con)]);
//         }
//     } else {
//         // Insert a new blog
//         $sql = "INSERT INTO blogs (blog_title, blog_description, blog_image, blog_filename) VALUES ('$blog_title', '$blog_description', '$imageName', '$fileName')";
//         if (mysqli_query($con, $sql)) {
//             echo json_encode(["success" => true, "message" => "Blog saved successfully"]);
//         } else {
//             echo json_encode(["success" => false, "message" => "Error saving blog: " . mysqli_error($con)]);
//         }
//     }
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_id = isset($_POST['blog_id']) ? intval($_POST['blog_id']) : 0; // Check if updating
    $blog_title = isset($_POST['blog_title']) ? $_POST['blog_title'] : "";
    $blog_description = isset($_POST['blog_description']) ? $_POST['blog_description'] : "";
    $content = isset($_POST['content']) ? $_POST['content'] : "";

    $uploadDir = '../../assets/blog_images/';
    $contentDir = '../../assets/blogs/';

    if ($blog_id > 0) {
        // ========== UPDATE EXISTING BLOG ==========
        
        // Step 1: Fetch existing file names
        $sql = "SELECT blog_filename, blog_image FROM blogs WHERE blog_id = '$blog_id'";
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $existingFileName = $row['blog_filename'];
            $existingImageName = $row['blog_image'];
        } else {
            echo json_encode(["success" => false, "message" => "Blog not found"]);
            exit;
        }

        // Step 2: Update content file
        $contentFilePath = $contentDir . $existingFileName;
        if (!file_put_contents($contentFilePath, $content)) {
            echo json_encode(["success" => false, "message" => "Error updating content file"]);
            exit;
        }

        // Step 3: Handle image upload (overwrite existing image if a new one is provided)
        if (isset($_FILES['blog_image']) && $_FILES['blog_image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = $uploadDir . $existingImageName;
            if (!move_uploaded_file($_FILES['blog_image']['tmp_name'], $imagePath)) {
                echo json_encode(["success" => false, "message" => "Image upload failed"]);
                exit;
            }
        }

        // Step 4: Update blog in database
        $sql = "UPDATE blogs SET blog_title = '$blog_title', blog_description = '$blog_description' WHERE blog_id = '$blog_id'";
        if (mysqli_query($con, $sql)) {
            echo json_encode(["success" => true, "message" => "Blog updated successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error updating blog: " . mysqli_error($con)]);
        }
    } else {
        // ========== SAVE NEW BLOG ==========
        
        // Step 1: Handle image upload
        $imageName = "";
        if (isset($_FILES['blog_image']) && $_FILES['blog_image']['error'] === UPLOAD_ERR_OK) {
            $imageName = time() . '_' . basename($_FILES['blog_image']['name']);
            $imagePath = $uploadDir . $imageName;
            if (!move_uploaded_file($_FILES['blog_image']['tmp_name'], $imagePath)) {
                echo json_encode(["success" => false, "message" => "Image upload failed"]);
                exit;
            }
        }

        // Step 2: Save content to a new HTML file
        $fileName = time() . '_' . $blog_title . '.html';
        $contentFilePath = $contentDir . $fileName;
        if (!file_put_contents($contentFilePath, $content)) {
            echo json_encode(["success" => false, "message" => "Error saving content file"]);
            exit;
        }

        // Step 3: Insert new blog into database
        $sql = "INSERT INTO blogs (blog_title, blog_description, blog_image, blog_filename) 
                VALUES ('$blog_title', '$blog_description', '$imageName', '$fileName')";
        if (mysqli_query($con, $sql)) {
            echo json_encode(["success" => true, "message" => "Blog saved successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error saving blog: " . mysqli_error($con)]);
        }
    }
}


// Handle DELETE: Delete a blog
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);

    $blog_id = isset($_DELETE['blog_id']) ? intval($_DELETE['blog_id']) : 0;

    if ($blog_id <= 0) {
        echo json_encode(["success" => false, "message" => "Invalid blog ID"]);
        exit;
    }

    // Get the blog details (to retrieve file and image names)
    $sql = "SELECT blog_image, blog_filename FROM blogs WHERE blog_id = '$blog_id'";
    $result = mysqli_query($con, $sql);

    if (!$result || mysqli_num_rows($result) === 0) {
        echo json_encode(["success" => false, "message" => "Blog not found"]);
        exit;
    }

    $blog = mysqli_fetch_assoc($result);
    $imagePath = "../../assets/blog_images/" . $blog['blog_image'];
    $contentPath = "../../assets/blogs/" . $blog['blog_filename'];

    // Delete the blog from the database
    $deleteSql = "DELETE FROM blogs WHERE blog_id = '$blog_id'";
    if (mysqli_query($con, $deleteSql)) {
        // Delete the image file if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath); // Deletes the image
        }

        // Delete the content file if it exists
        if (file_exists($contentPath)) {
            unlink($contentPath); // Deletes the content file
        }

        echo json_encode(["success" => true, "message" => "Blog deleted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error deleting blog: " . mysqli_error($con)]);
    }
    exit;
}
// else{
//     http_response_code(405);
//     echo json_encode(["success" => false, "message" => "Method not allowed"]);
// }
exit;
?>
