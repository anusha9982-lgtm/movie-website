<?php
// feedback_process.php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "movie_site";
$port       = 3307;  // ✅ your custom port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name    = $_POST['name'];
$email   = $_POST['email'];
$message = $_POST['message'];

// Insert into feedback table
$sql = "INSERT INTO feedback (name, email, message) 
        VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='color:green; text-align:center;'>Thank you for your feedback! 😊</h2>";
    echo "<p style='text-align:center;'><a href='feedback.php'>Submit another feedback</a></p>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
