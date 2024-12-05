<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7f4; /* Light green background */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4caf50; /* Dark green header */
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h2, p {
            color: #4caf50; /* Dark green text color */
            margin-bottom: 10px;
        }


  .job-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 80px auto 20px;
  padding: 20px;
  max-width: 30%;
}

.job-card {
   width:100%; /*calc(33.33% - 20px); */
  box-sizing: border-box;
  border: 1px solid #ddd;
  padding: 20px;
  margin-bottom: 20px;
  background-color: #fff;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  cursor: pointer;
}

.job-card:hover {
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.job-card a {
  color: #333; 
  text-decoration: none;
  font-weight: bold;
}

.job-card a:hover {
  text-decoration: none;
}

.job-card h2 {
  margin-bottom: 10px;
  color: #4caf50; /* Title color */
}

.job-card p {
  margin: 0;
  color: #666; /* Text color */
}
    </style>
</head>

<nav>
    <header><h1>Profile Page</h1></header>

</nav>

</html>

<?php
include './api_connection/config.php';
session_start();

if(!isset($_SESSION['username'])) {
  header("Location: ./users/login.php");
  exit();
}
$userID = $_SESSION['userID'];

$sqlString = "SELECT * FROM jobs WHERE jobs.UserID = $userID";

$result = mysqli_query($con, $sqlString);

if ($result) {
  echo "<div class='job-container'>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<div class='job-card'>";
    echo "<h2>{$row['Title']}</h2>";
    echo "<p>Position: {$row['Position']}</p>";
    echo "<p>Company: {$row['Company']}</p>";
    echo '<form  method = "post">';
    echo '<input type="button" id="edit_btn" value="Edit" onclick="window.location.href=\'editJob.php?jobID=' . $row['JobID'] . '\';">';
    echo '<button id="deleteJobBtn" onclick="deleteJob(' . $_SESSION['jobID'] . ')">Delete Job</button>';
    

    echo '</form>';
    echo "</div>";
  }
  echo "</div>";
}



?>