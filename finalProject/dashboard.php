<?php
include './api_connection/config.php';
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ./users/login.php");
  exit();
}
$sqlString = "SELECT jobs.*, users.username
              FROM jobs
              JOIN users ON jobs.userID = users.userID";

$result = mysqli_query($con, $sqlString);

if ($result) {
  echo "<div class='job-container'>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<a href='jobDetails.php?jobID={$row['JobID']}' class='job-card-link'>";
    echo "<div class='job-card'>";
    echo "<h2>{$row['Title']}</h2>";
    echo "<p>Position: {$row['Position']}</p>";
    echo "<p>Company: {$row['Company']}</p>";
    echo "<p>Job Poster: {$row['username']}</p>";
    echo "</a>";
    echo "</div>";
  }
  echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find Jobs</title>
  <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

  <nav>
    <div>
      <img src="images/logo.jpg" alt="Career Spotlight Logo" class="logo">
      <a href="dashboard.php">Apply to a Job</a>
      <a href="postJob.php">Post a Job</a>
    </div>

    <div>
      <a href="./users/login.php">Login</a>
      <a href="./users/register.php" class="signup">Signup</a>
    </div>
  </nav>

  <footer>
    <div class="footer-container">
      <div class="footer-column">
        <h2>Connect with us</h2>
        <div class="social-icons">
          <a href="#" target="_blank">Facebook</a>
          <a href="#" target="_blank">X.com</a>
          <a href="#" target="_blank">LinkedIn</a>
          <a href="#" target="_blank">Instagram</a>
        </div>
      </div>

      <!-- Newsletter Subscription -->
      <?php
      if (isset($_POST['subscribe'])) {
        $sql = "INSERT INTO newsletter_emails (email) VALUES ('$email')";
        $result = mysqli_query($con, $sql);

        if ($result) {
          echo '<script type="text/javascript">alert("Subscription successful!");</script>';
        } else {
          echo '<script type="text/javascript">alert("Subscription failed. Please try again.");</script>';
        }
      }
      ?>
      <div class="footer-column">
        <h2>Subscribe to our newsletter</h2>
        <form class="newsletter-form" method="post" action="">
          <input type="email" name="email" class="newsletter-input" placeholder="Enter your email" required>
          <button type="submit" class="newsletter-button" name="subscribe">Subscribe</button>
        </form>
      </div>
    </div>
  </footer>

</body>

</html>