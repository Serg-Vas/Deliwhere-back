<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the content type of the request
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? $_SERVER["CONTENT_TYPE"] : '';

    // Display the content type
    echo "Content Type: $contentType";
} else {
    // If the request method is not POST, display an error message
    echo "This script only works with POST requests.";
}
?>
