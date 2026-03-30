<?php include 'header.php'; ?>
<div class="container" style="text-align:center;">
    <h2 style="color:#4CAF50;">✔️ Success</h2>
    <p>
        <?php echo isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : "Your action was completed successfully!"; ?>
    </p>
    <a href="signup.php"><button>Go Back</button></a>
</div>
</body>
</html>
