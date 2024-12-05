<html>
    <head>
        <style>
        label {
            display: inline-block;

        }
        </style>
    </head>
</html>
<h2>Add & Update Operations</h2>

<form method="post">
  <label>First name:</label><input type="text" id="fname" name="fname"><br><br>
  <label>Last name:</label><input type="text" id="lname" name="lname"><br><br>
  <label>Date of Birth:</label><input type="text" id="dob" name="dob" placeholder="YYYY-mm-dd"><br><br>
  <label>Address:</label><input type="text" id="address" name="address"><br><br>
  <label>Email:</label><input type="email" id="email" name="email"><br><br>
  <label>Major Code:</label><input type="text" id="major" name="major"><br><br>
  <input type="submit" name="stSubmit" value="Submit">
  <input type="submit" name="updateSubmit" value="Update">
  <p style="color:red">Please send all the details for update while keeping the first name as is</p>
</form>

<br>
<h2>Delete Operations</h2>

<form method="post">
  <label>Student ID:</label><input type="text" id="stid" name="stid"><br><br>
  <input type="submit" name="deleteSubmit" value="Delete">
  
</form>
<?php

($con = mysqli_connect("localhost:3306", "root", "", "liudb")) or
die(
    "<p>Unable to connect to the database server.</p>" .
        mysqli_connect_error()
);


if(ISSET($_POST['stSubmit'])){
    $datefiled = date("Y-m-d", strtotime($_POST['dob']));

    $sql101="insert into student(ID, fname, lname, dob, address , email, major) values (null, '".$_POST['fname']."','".$_POST['lname']."' ,'".$datefiled."','".$_POST['address']."',
    '".$_POST['email']."','".$_POST['major']."')";   
    
     $result1=mysqli_query($con,$sql101) or die(mysqli_error($con)); 
     echo"<h1>Done adding the student</h1>";
     echo '<script type="text/javascript"> alert("Registered successfully") </script>';
     emptyFields();
}
if(ISSET($_POST['updateSubmit'])){
    $datefiled = date("Y-m-d", strtotime($_POST['dob']));
    /*
    UPDATE `student` SET `fname`='Jamie',`lname`='Abi Raad',`dob`='1980-10-29',`address`='Sin el Fil',`email`='jamesAbiraad@liu.edu.lb',`major`='PHARMA' WHERE fname="Jane"
    */
    
    $name = $_post['fname'];
    $lname = $_post['lname'];
    $email = $_post['email'];

    $sql="UPDATE student SET fname='$name', lname='$lname', dob='".$_POST['dob']."', address='".$_POST['address']."' , email='$email', major='".$_POST['major']."' 
    where fname='$name'";   
     $result=mysqli_query($con,$sql) 
       or die(mysqli_error($con)); 

     echo"<h1>Done adding the student</h1>";
     echo '<script type="text/javascript"> alert("Updated successfully") </script>';
     emptyFields();
}
if(ISSET($_POST['deleteSubmit'])){

    $sql2="delete from student where ID=".$_POST['stid']."";   
     $result2=mysqli_query($con,$sql2) or die(mysqli_error($con)); 
     //echo"<h1>Done adding the student</h1>";
     echo '<script type="text/javascript"> alert("Deleted successfully") </script>';
     emptyFields();
}
function emptyFields(){
    $_POST['fname']="";
    $_POST['lname']="";
    $_POST['dob']="";
    $_POST['address']="";
    $_POST['email']="";
    $_POST['major']="";
}

$sqlString3 = "SELECT * from student";
($QueryResult3 = mysqli_query($con, $sqlString3)) or
    die(
        "<p>Unable to execute the query.</p>" .
            "<p>Error code " .
            mysqli_errno($con) .
            ": " .
            mysqli_error($con)
    ) .
        "</p>";
echo "<p>Successfully updated" .mysqli_num_rows($QueryResult3) ." record(s).</p>";
echo "<table border=1><tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Address</th><th>Email</th><th>Major</th></tr>";
if (mysqli_num_rows($QueryResult3) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_array($QueryResult3)) {
        echo "<tr><td>" .
            $row["ID"] .
            "</td><td>" .
            $row["fname"] .
            "</td><td>" .
            $row["lname"] .
            "</td><td>" .
            $row["dob"] .
            "</td><td>" .
            $row["address"] .
            "</td><td>" .
            $row["email"] .
            "</td></tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";


?>