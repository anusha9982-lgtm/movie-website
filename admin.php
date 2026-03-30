<?php

session_start();

include 'db.php';



// 🛑 SECURITY GATE: Only allow admins

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {

    header("Location: movies.php?error=unauthorized");

    exit();

}



include 'header.php';

?>



<div class="reviews-section">

    <div class="section-header">

        <h2>Admin Dashboard</h2>

    </div>

    

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px;">

        <div class="review-form-card" style="text-align: center;">

            <h1 style="color: var(--primary);">Users</h1>

            <p>Manage registered members</p>

        </div>

        <div class="review-form-card" style="text-align: center;">

            <h1 style="color: var(--primary);">Feedback</h1>

            <p>View user messages</p>

        </div>

        <div class="review-form-card" style="text-align: center;">

            <h1 style="color: var(--primary);">Reviews</h1>

            <p>Moderate user comments</p>

        </div>

    </div>



    <h3 style="margin-bottom: 20px;">Recent User Feedback</h3>

    <table style="width: 100%; border-collapse: collapse; background: #181818;">

        <thead>

            <tr style="background: var(--primary);">

                <th style="padding: 15px;">User</th>

                <th style="padding: 15px;">Message</th>

                <th style="padding: 15px;">Date</th>

            </tr>

        </thead>

        <tbody>

            <?php

            $res = $conn->query("SELECT * FROM feedback ORDER BY submitted_at DESC");

            while($f = $res->fetch_assoc()) {

                echo "<tr style='border-bottom: 1px solid #333;'>

                        <td style='padding: 15px;'>{$f['name']}</td>

                        <td style='padding: 15px;'>{$f['message']}</td>

                        <td style='padding: 15px;'>{$f['submitted_at']}</td>

                      </tr>";

            }

            ?>

        </tbody>

    </table>

</div>