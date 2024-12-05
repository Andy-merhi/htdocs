<?php
session_start();
include './api_connection/config.php';

$jobID = $_GET['jobID'];

$sql = "SELECT jobs.*, users.fname, users.lname, users.username AS jobPosterUsername
        FROM jobs
        JOIN users ON jobs.UserID = users.UserID
        WHERE jobs.JobID = $jobID";
$result = mysqli_query($con, $sql);

if ($result && $row = mysqli_fetch_array($result)) {
    $title = $row['Title'];
    $description = $row['Description'];
    $company = $row['Company'];
    $position = $row['Position'];
    $minSalary = $row['MinSalary'];
    $maxSalary = $row['MaxSalary'];
    $city = $row['City'];
    $region = $row['Region'];
    $skillsRequired = $row['SkillsRequired'];
    $jobPosterID = $row['UserID'];
    $jobPosterUsername = $row['jobPosterUsername'];
    $jobPosterfname = $row['fname'];
    $jobPosterlname = $row['lname'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <link rel="stylesheet" href="css/jobDetails.css">
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

    <div class="job-details-container">
        <h2><?php echo $title; ?></h2>
        <p>Position: <?php echo $position; ?></p>
        <p>Company: <?php echo $company; ?></p>
        <p>Description: <?php echo $description; ?></p>
        <p>Min Salary: <?php echo $minSalary; ?></p>
        <p>Max Salary: <?php echo $maxSalary; ?></p>
        <p>City: <?php echo $city; ?></p>
        <p>Region: <?php echo $region; ?></p>
        <p>Skills Required: <?php echo $skillsRequired; ?></p>
        <p>Job Poster: <?php echo $jobPosterfname . ' ' . $jobPosterlname; ?></p>
        <?php

        $jobID = $_GET['jobID'];

        $sql = "SELECT jobs.* FROM jobs WHERE jobs.jobID = $jobID";
        $result = mysqli_query($con, $sql);

        if ($result && $row = mysqli_fetch_array($result)) {
            $jobPosterID = $row['UserID'];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $targetDir = "uploads/";
            $fileName = basename($_FILES["cv"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowedTypes = array("pdf", "doc", "docx");
            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFilePath)) {
                    $sqlString = "INSERT INTO applications (userID, jobID, cv_path) VALUES ('$jobPosterID', '$jobID', '$targetFilePath')";
                    $result = mysqli_query($con, $sqlString);

                    if ($result) {
                        echo "Application submitted successfully!";
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "Invalid file type. Please upload a PDF, DOC, or DOCX file.";
            }
        }
        ?>


        <!-- Apply to Job Section -->
        <div class="apply-section">
            <h3>Apply to this Job</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="cv">Upload your CV:</label>
                <input type="file" id="cv" name="cv" accept=".pdf, .doc, .docx" required>
                <button type="submit">Submit Application</button>
            </form>
        </div>
        <a href="dashboard.php" class="back-button">Back to Job Listings</a>
    </div>

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