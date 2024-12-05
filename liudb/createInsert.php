<?php
($con = mysqli_connect("localhost:3306", "root", "", "liudb")) or
die(
    "<p>Unable to connect to the database server.</p>" .
        mysqli_connect_error()
);

echo "<h1>Create Tables in PHP</h1>";
if ($con){ 
    if (isset($_POST['CreateTable1'])) {
    
        // create student table
       $sql1 = "CREATE table student 
       (ID int primary key auto_increment, fname varchar(50) , lname varchar(50), dob date , address varchar(50),email varchar(50), major varchar(5) );";
       $QueryResult1 = mysqli_query($con , $sql1) 
       or die ("Unable to execute the query".mysqli_error($con));
       echo "<h2 style='color:orange'>Done 1</h2>";
    } 


    if (isset($_POST['CreateTable2'])) {
    //major table

    $sql2 = "CREATE table major (code varchar(5) primary key , description varchar(50));";
    $QueryResult2 = mysqli_query($con , $sql2)
    or die ("Unable to execute the query".mysqli_error($con));

    //user table

    $sql3 = "CREATE table user (email varchar(50) primary key ,password varchar(50) );"; 
    $QueryResult3 = mysqli_query($con , $sql3)
    or die ("Unable to execute the query".mysqli_error($con));
    echo "<h2 style='color:green'>Done 2</h2>";
    }
}
?>


<form method="POST" onsubmit="return true;">
    <button type="submit" name="CreateTable1">Create Student Table</button>
    <button type="submit" name="CreateTable2">Create Major & User Table</button>
    <button type="submit" name="CreateTable3">Rest of the Code</button>
</form>


<?php


// add foreign key, relationship between student and major 
if(isset($_POST['CreateTable3'])) {
    $sql4 = "ALTER TABLE student ADD FOREIGN KEY (major) REFERENCES major(code) ,ADD FOREIGN KEY (email) REFERENCES user(email);"; 
    $QueryResult4 = mysqli_query($con , $sql4)
        or die ("Unable to execute the query".mysqli_error($con));
    // insert few records into major table 

    $sql5 = "INSERT INTO major (code, description) values ('CSCI', 'COMPUTER SCIENCE'),
     ('CSIT', 'Information technology '),
     ('MATH', 'Mathematics'),
     ('PHARMA', 'Pharmacy')";
     //////
     $QueryResult5 = mysqli_query($con , $sql5)
     or die ("Unable to execute the query".mysqli_error($con));
     // create images table 
     

     $sql6 = "CREATE table images (id int primary key auto_increment ,file varchar(100), type varchar(30), size int(11) ) ;"; 
     $QueryResult6 = mysqli_query($con , $sql6)
     or die ("Unable to execute the query".mysqli_error($con));


     if($QueryResult4 and $QueryResult5 and $QueryResult6){
        echo "<h2>We are done!</h2>";
    //to navigate to other pages
        header('location: donePage.php');
     }
    }




?>