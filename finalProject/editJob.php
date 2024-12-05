<?php 
session_start();
include './api_connection/config.php';

if (!isset($_GET['jobID']) || !is_numeric($_GET['jobID'])) {
    die("Invalid job ID.");
}

$jobID = $_GET['jobID'];

$sql1 = "SELECT jobs.*
        FROM jobs
        WHERE jobs.JobID = $jobID";
$result = mysqli_query($con, $sql1);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($con));
}

if ($row = mysqli_fetch_array($result)) {
    $title = $row['Title'];
    $description = $row['Description'];
    $company = $row['Company'];
    $position = $row['Position'];
    $minSalary = $row['MinSalary'];
    $maxSalary = $row['MaxSalary'];
    $city = $row['City'];
    $region = $row['Region'];
    $skillsRequired = $row['SkillsRequired'];
}

if (isset($_POST['EditJob'])) {
    $title2 = $_POST['jobTitle'];
    $description2 = $_POST['jobDescription'];
    $companyName2 = $_POST['company'];
    $position2 = $_POST['Position'];
    $minSalary2 = $_POST['MinSalary'];
    $maxSalary2 = $_POST['MaxSalary'];
    $city2 = $_POST['City'];
    $region2 = $_POST['Region'];
    $skillsRequired2 = $_POST['SkillsRequired'];

    $sqlString1 = "UPDATE jobs 
    SET Title = '$title2',
        Description = '$description2',
        Company = '$companyName2',
        Position = '$position2',
        MinSalary = '$minSalary2',
        MaxSalary = '$maxSalary2',
        City = '$city2',
        Region = '$region2',
        SkillsRequired = '$skillsRequired2'
    WHERE JobID = '$jobID'";

    $result = mysqli_query($con, $sqlString1);

    if ($result) {
        echo '<script type="text/javascript"> alert("Job edited successfully") </script>';
        header("Location: ./dashboard.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/postJob.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="form-container">
            <h1>Update a Job</h1>
            <form id="jobForm" method="post">
                <label for="jobTitle">Job Title:</label>
                <input type="text" id="jobTitle" name="jobTitle" value="<?= htmlspecialchars($title) ?>" required>

                <label for="Position">Position:</label>
                <input type="text" id="Position" name="Position" value="<?= htmlspecialchars($position) ?>" required>

                <label for="company">Company:</label>
                <input type="text" id="company" name="company" value="<?= htmlspecialchars($company) ?>" required>

                <label for="MinSalary">Min Salary:</label>
                <input type="text" id="MinSalary" name="MinSalary" value="<?= htmlspecialchars($minSalary) ?>" required>

                <label for="MaxSalary">Max Salary:</label>
                <input type="text" id="MaxSalary" name="MaxSalary" value="<?= htmlspecialchars($maxSalary) ?>" required>

                <label for="City">City:</label>
                <input type="text" id="City" name="City" value="<?= htmlspecialchars($city) ?>" required>

                <label for="Region">Region:</label>
                <input type="text" id="Region" name="Region" value="<?= htmlspecialchars($region) ?>" required>

                <label for="SkillsRequired">Skills Required:</label>
                <input type="text" id="SkillsRequired" name="SkillsRequired" value="<?= htmlspecialchars($skillsRequired) ?>" required>

                <label for="jobDescription">Job Description:</label>
                <textarea id="jobDescription" name="jobDescription" value="<?= htmlspecialchars($description) ?>" required></textarea>

                <!-- Submit Button -->
                <input type="submit" name="EditJob" value="Edit Job">
                <a href="profile.php" class="back-button">Back to profile</a>
            </form>
        </div>
    </div>

</body>
</html>