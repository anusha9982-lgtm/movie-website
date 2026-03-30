<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - MovieSite</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/bg-login.jpg');
            background-size: cover;
            display: flex; align-items: center; justify-content: center; min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Sign In</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <form action="login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
        </form>
        <div class="switch-link">New to MovieSite? <a href="signup.php">Sign up now.</a></div>
    </div>
</body>
</html>