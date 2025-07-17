<?php
// Database configuration
$host = 'localhost';
$dbname = 'swapnil';
$username = 'root';
$password = ''; // Default password for XAMPP is empty

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data has been posted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect the email from the form and escape it to prevent SQL injection
    $email = $conn->real_escape_string($_POST['email']);

    // Prepare and execute the SQL query to insert the email
    $sql = "INSERT INTO email_list (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
        echo "You have successfully signed up!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
