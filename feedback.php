<?php include 'header.php'; ?>

<div class="form-container">
    <h2>We value your feedback</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db.php'; // Uses the central connection
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['message'];

        // Secure Prepared Statement
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $msg);

        if ($stmt->execute()) {
            echo "<div class='alert success'>✅ Feedback Sent! Thank you.</div>";
        } else {
            echo "<div class='alert error'>❌ Error: " . $conn->error . "</div>";
        }
        $stmt->close();
        $conn->close();
    }
    ?>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <textarea name="message" placeholder="What did you think of the movies?" required></textarea>
        <button type="submit">Submit Feedback</button>
    </form>
</div>

</body>
</html>