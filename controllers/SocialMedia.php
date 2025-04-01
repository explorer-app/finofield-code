<?php
// Allow CORS
header("Access-Control-Allow-Origin: https://www.finofield.com"); // Allow only your domain
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow these HTTP methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allow these headers
header("Content-Type: application/json"); // Set response type

// Handle preflight (OPTIONS) request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204); // No Content
    exit();
}

include("../database/DbConnection.php");

$db = new DbConnection();
$conn = $db->getConnection();
if (!isset($conn)) {
    echo json_encode(["error" => "Database connection is not set"]);
    exit();
}

// Query to get social media links
$sql = "SELECT whatsapp_link, facebook_link, twitter_link, linkedin_link FROM setting LIMIT 1";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["success" => true, "data" => $row]);
    } else {
        echo json_encode(["success" => false, "message" => "No records found"]);
    }
} else {
    echo json_encode(["error" => "Query execution failed: " . $conn->error]);
}

$conn->close();
?>
