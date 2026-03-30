<?php 
// Ensure session is started in the header or here
include 'header.php'; 

// 🛑 SECURITY: If not logged in, kick them back to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<div class="reviews-section" style="max-width: 600px; margin-top: 100px;">
    
    <div class="section-header">
        <h2>Account Settings</h2>
    </div>

    <div class="review-form-card" style="text-align: center; padding: 40px 30px;">
        
        <div class="review-avatar" style="width: 80px; height: 80px; font-size: 32px; margin: 0 auto 20px auto; border-radius: 8px;">
            <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
        </div>

        <h1 style="color: #fff; margin-bottom: 5px; font-size: 2rem;">
            <?php echo htmlspecialchars($_SESSION['username']); ?>
        </h1>
        
        <p style="color: #777; margin-bottom: 30px;">
            Member since <?php echo date("F Y"); ?>
        </p>

        <div style="text-align: left; background: #222; border-radius: 4px; padding: 20px; margin-bottom: 30px;">
            <div style="margin-bottom: 20px; border-bottom: 1px solid #333; padding-bottom: 15px;">
                <span style="color: #777; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 5px;">Email Address</span>
                <span style="color: #fff; font-size: 1.1rem;">
                    <?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : "Not set"; ?>
                </span>
            </div>

            <div>
                <span style="color: #777; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 5px;">Current Plan</span>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #fff; font-size: 1.1rem;">Premium Ultra HD</span>
                    <span style="color: #46d369; font-size: 0.7rem; border: 1px solid #46d369; padding: 2px 8px; border-radius: 2px; font-weight: bold;">ACTIVE</span>
                </div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <a href="movies.php" style="text-decoration: none;">
                <button class="btn-gray" style="width: 100%; padding: 12px; margin: 0;">Browse Movies</button>
            </a>
            
            <a href="logout.php" style="text-decoration: none;">
                <button style="width: 100%; padding: 12px; background: #e50914; border: none; color: white; font-weight: bold; border-radius: 4px; cursor: pointer;">
                    Sign Out
                </button>
            </a>
        </div>
    </div>

    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
    <div style="margin-top: 20px; text-align: center;">
        <a href="admin.php" style="color: #FFD700; text-decoration: none; font-size: 0.9rem; font-weight: bold;">
            进入 Admin Dashboard →
        </a>
    </div>
    <?php endif; ?>

</div>

</body>
</html>