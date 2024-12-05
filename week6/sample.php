<?php

($con = mysqli_connect("localhost:3306", "root", "", "Airline")) or
    die(
        "<p>Unable to connect to the database server.</p>" .
            mysqli_connect_error()
    );

//     $sql = "CREATE TABLE Flight (FlightID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
//           FromCity VARCHAR(100) NOT NULL, ToCity VARCHAR(100) NOT NULL,  INT NOT NULL)";

// ($QueryResult = mysqli_query($con, $sql)) or
// die(
//     "<p>Unable to execute the query.</p>" .
//         "<p>Error code " .
//         mysqli_errno($con) .
//         ": " .
//         mysqli_error($con)
// ) .
//      "</p>";
// echo "<p>Successfully created" ;

// $sql5 = "INSERT INTO Flight (FlightID, FromCity,ToCity,Price) values (1, 'beirut','london',1300),
//       (2,'dubai','paris',4800),
//       (3,'rome','berlin',7900),
//       (4,'tokyo','new york',1000)
//       ;"
     
//      ;
//      $QueryResult5 = mysqli_query($con , $sql5)
//      or die ("Unable to execute the query".mysqli_error($con));
//      echo "<p> Successful insertion</p>";



     $sqlString2 = "SELECT * FROM Flight";
    ($QueryResult2 = mysqli_query($con, $sqlString2)) or
        die(
            "<p>Unable to execute the query.</p>" .
                "<p>Error code " .
                mysqli_errno($con) .
                ": " .
                mysqli_error($con)
        ) .
            "</p>";
    echo "<p>Successfully updated" .mysqli_num_rows($QueryResult2) ." record(s).</p>";
    echo "<table border=1 width = 50%><tr><th>Flight NO</th><th>From City</th><th>To City</th><th>Price</th></tr>";
    if (mysqli_num_rows($QueryResult2) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_array($QueryResult2)) {
            echo "<tr><td>" .
                $row["FlightID"] .
                "</td><td>" .
                $row["FromCity"] .
                "</td><td>" . 
                $row["ToCity"].
                "</td><td>" .
                $row["Price"].
                "</td></tr>";
        }
    } else {
        echo "0 results";
    }
    echo "</table>";
    
    //a add text when we click on it will take us to the add.php page
    echo '<br/><a href="add.php" style = "margin: 0% 25%" >Add a flight</a>'; 
?>
