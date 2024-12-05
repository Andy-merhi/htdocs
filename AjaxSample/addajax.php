<?php
    include "config.php";
    if(isset($_POST['add'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $major=$_POST['major'];
        mysqli_query($con,"insert into 'student' (fname,lname,dob,email,major) values ('$fname','$lname','$dob','$email','$major')");
        
    }
?>