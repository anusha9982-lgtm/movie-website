<?php
session_start();

// Database Connection
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "movie_site";
$port       = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    $movie_id = $_POST['movie_id'];
    $user     = $_SESSION['username'];
    $rating   = intval($_POST['rating']);
    $review   = $conn->real_escape_string($_POST['review']);

    // Insert Review
    $sql = "INSERT INTO reviews (movie_id, username, rating, review_text) 
            VALUES ('$movie_id', '$user', '$rating', '$review')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the movie page
        header("Location: movie.php?movie=" . $movie_id . "&success=1");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>