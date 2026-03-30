<?php
session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "movie_site"; // ✅ Updated to match the new database we created
$port       = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user  = trim($_POST['username']);
    $email = trim($_POST['email']); // ✅ 1. Capture the email
    $pass  = $_POST['password'];

    // Check if username already exists
    $check_sql = "SELECT user_id FROM users WHERE username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $user);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $_SESSION['error'] = "⚠️ Username already taken. Please choose another.";
        header("Location: signup.php");
        exit();
    }
    $check_stmt->close();

    // Hash password
    $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

    // ✅ 2. Update SQL to insert Username, Email, AND Password
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    // ✅ 3. Update bind_param to "sss" (String, String, String)
    $stmt->bind_param("sss", $user, $email, $hashed_pass);

    if ($stmt->execute()) {
        $_SESSION['success'] = "✅ Signup successful! Please log in.";
        header("Location: login.php");
        exit();
    } else {
        // This will catch if the email is a duplicate (since email is UNIQUE in DB)
        $_SESSION['error'] = "Something went wrong (Email might already be registered). Try again.";
        header("Location: signup.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>	 