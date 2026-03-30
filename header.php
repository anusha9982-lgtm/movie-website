<?php 
// ✅ Ensures session is started exactly once across the entire application
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieSite - Official Streaming</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar" id="navbar">
    <a href="movies.php" class="logo">MovieSite</a>
    
    <div style="display: flex; align-items: center; gap: 20px;">
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Titles, people, genres..." 
                   style="background: #000; border: 1px solid #aaa; padding: 5px 10px; color: white; border-radius: 4px;">
        </div>

        <div class="nav-right">
            <a href="movies.php">Home</a>
            <a href="feedback.php">Feedback</a>

            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                <a href="admin.php" style="color: #FFD700; font-weight: bold;">Admin Panel</a>
            <?php endif; ?>

            <?php if (isset($_SESSION['username'])): ?>
                <a href="personal.php">Profile</a>
                <a href="logout.php" style="color: #e50914;">Sign Out</a>
            <?php else: ?>
                <a href="login.php">Sign In</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
    // 🔹 3. SCROLL EFFECT: Transition navbar from transparent to solid black
    window.onscroll = function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    };
</script>