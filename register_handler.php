<?php
// Include the database connection
require_once 'connection.php';

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate form data (perform more detailed validation as needed)
    if (empty($name) || empty($email) || empty($message)) {
        // Handle validation error (e.g., display error message and redirect)
        echo "Please fill out all required fields.";
        exit;
    }

    try {
        // Prepare SQL statement to insert user data into 'user' table
        $sql = "INSERT INTO user (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        // Execute the SQL statement
        $stmt->execute();

        // Display success message or redirect to a success page
        echo "Enquiry submitted successfully!";
        header("Location: sucess.php");

    } catch (PDOException $e) {
        // Display error message if database operation fails
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect or display an error message if the form is not submitted via POST
    echo "Invalid request method.";
}
?>
