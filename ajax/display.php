<?php
include "config.php";

$sql = "SELECT  fname, lname, email, major FROM student";
$result = $conn->query($sql);

    $sql1=mysqli_query($conn,"select * from student");
    while($row=mysqli_fetch_array($sql1)){
        echo "<div>";
        echo "<p><strong>First Name: " . $row["fname"] . "</p>";
        echo "<p><strong>Last Name: " . $row["lname"] . "</p>";
        echo "<p><strong>Email: " . $row["email"] . "</p>";
        echo "<p><strong>Major: " . $row["major"] . "</p>";
        
        echo '<button type="button" id = "edit">Edit</button>';
        echo '<button type="button" id = "delete">Delete</button>';
        echo "<hr>";
        echo "</div>";
        }
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Student Data</title>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: 'get_student_data.php',
                type: 'POST',
                success: function(response) {

                    $('#studentData').html(response);
                },
                error: function(xhr, status, error) {

                    console.error(error);
                }
            });
        });
    </script>
</head>
<body>
</body>
</html>