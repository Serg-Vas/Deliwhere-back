<?php
// Check if data has been sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving JSON data sent in the POST request
    $json_data = file_get_contents("php://input");

    // If data is received
    if ($json_data !== false) {
        // Decode JSON data
        $decoded_data = json_decode($json_data, true);

        // Check if decoding was successful
        if ($decoded_data !== null) {
            // Process the received data
            // For example, print the received data
            echo "Received data:\n";
            print_r($decoded_data);
        } else {
            // Handle JSON decoding error
            echo "Error decoding JSON data.";
        }
    } else {
        // Handle error in retrieving POST data
        echo "Error retrieving POST data.";
    }
} else {
    // Handle cases where the request method is not POST
    echo "This endpoint only accepts POST requests.";
}
?>
