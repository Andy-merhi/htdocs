<?php

// session_start();
// include './api_connection/config.php';

// if (!isset($_SESSION['jobID'])) {
//     // User is not authenticated or jobID is not set
//     die("Invalid job ID.");
// }

// $jobID = $_SESSION['jobID'];

// $sql = "DELETE FROM jobs WHERE JobID = $jobID";


// $result = mysqli_query($con, $sql);

// if ($result) {
//         echo '<script type="text/javascript"> alert("Job deleted successfully") </script>';
//         header("Location: ./profile.php");
//     }
//     else{
//         echo '<script type="text/javascript"> alert("unable  to delete job") </script>';
//     }



include './api_connection/config.php';
session_start();

if (!isset($_SESSION['userID']) || !isset($_SESSION['jobID'])) {
    die("Invalid job ID.");
}

$jobID = $_POST['jobID'];

$sql = "DELETE FROM jobs WHERE JobID = $jobID AND UserID = {$_SESSION['userID']}";

if (mysqli_query($con, $sql)) {
    echo 'success';
} else {
    echo 'error: ' . mysqli_error($con);
}
?>
