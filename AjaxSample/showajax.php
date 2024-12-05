<?php
include "config.php";
if(isset($_POST['show'])){   
    $sql1=mysqli_query($con,"select * from student");
    while($row=mysqli_fetch_array($sql1)){
        
         echo "<div class='student-info'>";
         echo "<p><strong>First Name:</strong> " . $row['fname'] . "</p>";
         echo "<p><strong>Last Name:</strong> " . $row['lname'] . "</p>";
         echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
         echo "<p><strong>Major:</strong> " . $row['major'] . "</p>";
         echo "<button value='" . $row['ID'] . "' class='edit'>Edit</button> | <button class='delete'  value='" . $row['ID'] . "'>Delete</button>  
         </td></div><hr>";

        }
}
?>