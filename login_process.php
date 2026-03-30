<?php
session_start();

// Database Connection
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "movie_site";
$port       = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = trim($_POST['username']);
    $pass = $_POST['password'];

    // selecting 'email' and 'is_admin' from the database
    $sql = "SELECT user_id, username, password, email, is_admin FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        
        if (password_verify($pass, $row['password'])) {
            // SUCCESS: Storing user details in the session
            $_SESSION['user_id']  = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email']    = $row['email'];    // Required for personal.php
            $_SESSION['is_admin'] = $row['is_admin']; // Required for Admin Panel

            header("Location: movies.php?login=success");
            exit();
        } else {
            $_SESSION['error'] = "❌ Wrong password. Try again.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "❌ User not found. Please sign up first.";
        header("Location: signup.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>