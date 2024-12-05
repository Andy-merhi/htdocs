<?php
    define("db_SERVER", "localhost:3306");
    define("db_USER", "root");
    define("db_PASSWORD", "");
    define("db_DBNAME", "customer");

    $con = mysqli_connect(db_SERVER, db_USER, db_PASSWORD, db_DBNAME)
    or die ("Failed to connect to MySQL: " . mysqli_connect_error());

    $cname = $_POST['cname'];
    $caddress = $_POST['caddress'];
    $cphonenumber = $_POST['cphonenumber'];

    $sql = "INSERT INTO Customer (Cname, Caddress, Cphonenumber) VALUES ('$cname', '$caddress', '$cphonenumber')";
    
    if(mysqli_query($con,$sql)){
        echo "New record created successfully";
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_connect_error();
    }

    mysqli_close($con);

?>