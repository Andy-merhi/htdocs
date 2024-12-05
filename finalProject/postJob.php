<?php
include './api_connection/config.php';

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ./users/login.php");
    exit();
}

$userId = $_SESSION['userID'];

if (isset($_POST['PostJob'])) {
    $title = $_POST['jobTitle'];
    $description = $_POST['jobDescription'];
    $companyName = $_POST['company'];
    $position = $_POST['Position'];
    $minSalary = $_POST['MinSalary'];
    $maxSalary = $_POST['MaxSalary'];
    $city = $_POST['City'];
    $region = $_POST['Region'];
    $skillsRequired = $_POST['SkillsRequired'];

    $sqlString = "INSERT INTO jobs (Title, Description, Company, Position, MinSalary, MaxSalary, City, Region, SkillsRequired, userID) 
                  VALUES ('$title', '$description', '$companyName', '$position', '$minSalary', '$maxSalary', '$city', '$region', '$skillsRequired', '$userId')";

    $result = mysqli_query($con, $sqlString);

    if ($result) {
        echo '<script type="text/javascript"> alert("Job added successfully") </script>';
        header("Location: ./dashboard.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="css/postJob.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Post a Job</h1>
            <form id="jobForm" method="post">
                <label for="jobTitle">Job Title:</label>
                <input type="text" id="jobTitle" name="jobTitle" required>

                <label for="Position">Position:</label>
                <input type="text" id="Position" name="Position" required>

                <label for="company">Company:</label>
                <input type="text" id="company" name="company" required>

                <label for="MinSalary">Min Salary:</label>
                <input type="text" id="MinSalary" name="MinSalary" required>

                <label for="MaxSalary">Max Salary:</label>
                <input type="text" id="MaxSalary" name="MaxSalary" required>

                <label for="City">City:</label>
                <input type="text" id="City" name="City" required>

                <label for="Region">Region:</label>
                <input type="text" id="Region" name="Region" required>

                <label for="SkillsRequired">Skills Required:</label>
                <input type="text" id="SkillsRequired" name="SkillsRequired" required>

                <label for="jobDescription">Job Description:</label>
                <textarea id="jobDescription" name="jobDescription" required></textarea>

                <!-- Submit Button -->
                <input type="submit" name="PostJob" value="Post Job">
                <a href="dashboard.php" class="back-button">Back to Dashboard</a>
            </form>
        </div>
    </div>
</body>

</html>