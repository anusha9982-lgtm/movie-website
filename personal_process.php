<?php
session_start();

$servername = "localhost";
$username   = "root";
$password   = ""; // no password for root in XAMPP
$dbname     = "movie_site";
$port       = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
$address  = $_POST['address'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$dob      = $_POST['dob'];

// 🔹 Step 1: Check if email already exists for another user
$checkSql = "SELECT user_id FROM users WHERE email = ? AND user_id != ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("si", $email, $user_id);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    // Email already taken
    echo "<h2 style='color:red; text-align:center;'>❌ This email is already registered. Please use another one.</h2>";
    echo "<p style='text-align:center;'><a href='personal.php?user_id=$user_id'>Go Back</a></p>";
    exit();
}

// 🔹 Step 2: If not duplicate, update user row
$sql = "UPDATE users 
        SET address=?, email=?, password=?, dob=? 
        WHERE user_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $address, $email, $password, $dob, $user_id);

if ($stmt->execute()) {
    $_SESSION['username'] = $email; 
    header("Location: movies.php?details=success");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>