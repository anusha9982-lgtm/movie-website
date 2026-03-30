<?php include 'header.php';

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "movie_site";
$port       = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$sql = "SELECT * FROM feedback ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>
<div class="container" style="max-width: 900px; margin: 50px auto; text-align: center;">
    <h2>User Feedback Dashboard</h2>
    <div style="display: flex; justify-content: center;">
        <table style="border-collapse: collapse; width: 90%; text-align: center;">
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Date</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['feedback_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['message']}</td>
                            <td>{$row['submitted_at']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No feedback submitted yet</td></tr>";
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
<?php $conn->close(); ?>