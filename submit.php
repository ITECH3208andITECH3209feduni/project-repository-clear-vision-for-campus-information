<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];

    // Store feedback data in a file
    $data = array(
        "name" => $name,
        "email" => $email,
        "feedback" => $feedback
    );

    // Encode data as JSON
    $jsonData = json_encode($data);

    // Append data to a file
    $file = 'feedbackData.json';
    if (file_exists($file)) {
        // Append to existing file
        file_put_contents($file, $jsonData . PHP_EOL, FILE_APPEND);
    } else {
        // Create new file
        file_put_contents($file, $jsonData . PHP_EOL);
    }

    // Send response
    http_response_code(200);
    echo "Feedback submitted successfully!";
} else {
    // Invalid request method
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
