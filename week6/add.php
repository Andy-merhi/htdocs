<?php

($con = mysqli_connect("localhost:3306", "root", "", "airline")) or 
die (
    'Could not connect to database!<br />'.mysqli_connect_errno()
);

if(isset($_POST['addFlight'])){
    $flight_id = $_POST['flightID'];
    $formCity = $_POST['fromCity'];
    $toCity = $_POST['toCity'];
    $price = $_POST['price'];
    if(is_numeric($price)){
        $sql = "INSERT INTO Flight VALUES('$flight_id', '$formCity', '$toCity', '$price')";
        $result = mysqli_query($con, $sql);
        echo "<script>alert('Added Successfully!')</script>";
    }
    
}

if(ISSET($_POST['delete'])){
    echo "delting a flight";
    $id = $_POST['id'];

    $sql2="DELETE from flight where FlightID = '$id'";   
     $result2=mysqli_query($con,$sql2) or die(mysqli_error($con)); 
     echo"<h1>Done adding the student</h1>";
     echo '<script type="text/javascript"> alert("Deleted successfully") </script>';

}
    

    if(ISSET($_POST['update'])){
        //$datefiled = date("Y-m-d", strtotime($_POST['dob']));
        /*
        UPDATE `student` SET `fname`='Jamie',`lname`='Abi Raad',`dob`='1980-10-29',`address`='Sin el Fil',`email`='jamesAbiraad@liu.edu.lb',`major`='PHARMA' WHERE fname="Jane"
        */
        
        $flight = $_POST['flightID'];
        $from = $_POST['fromCity'];
        $to = $_POST['toCity'];
        $price = $_POST['price'];

    
        $sql100="UPDATE flight SET FromCity='$from', ToCity='$to', Price='$price' where FromCity='$from'";   
         $result=mysqli_query($con,$sql100) 
           or die(mysqli_error($con)); 
    
         //echo"<h1>Done adding the student</h1>";
         echo '<script type="text/javascript"> alert("Updated successfully") </script>';
    }

?>
 <!-- <h2>Add flight</h2>
<form method="post">
    <label for="fID">Flight ID</label>
    <input type="text" id="fID" name="flightID"  required><br>
    <label for="flightFrom">Flight From</label>
    <input type="text" id="flightFrom" name="fromCity" required><br>
    <label for="flightTo">Flight To</label>
    <input type="text" id="flightTo" name="toCity" required><br>
    <label for="price">Price</label>
    <input type="text" id="price" name=" " required><br>
    <input type="submit" name="addFlight" value="Submit">
    <br><br>

    <h2>update flight</h2>

  <input type="submit" name="update" value="Update">
   -->

   <form method="post">
    <h2>Delete flight</h2>

    <label>Flight ID:</label><input type="text"  name="id"><br><br>
    <input type="submit" name="delete" value="Delete">
    </form>
  



</form>