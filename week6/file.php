<?php
($con = mysqli_connect("localhost:3306", "root", "", "liudb")) or
    die(
        "<p>Unable to connect to the database server.</p>" .
            mysqli_connect_error()
    );



    $sqlString2 = "Select * FROM user";
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
    echo "<table border=1><tr><th>Email</th><th>Password</th></tr>";
    if (mysqli_num_rows($QueryResult2) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_array($QueryResult2)) {
            echo "<tr><td>" .
                $row["email"] .
                "</td><td>" .
                $row["password"] .
                "</td></tr>";
        }
    } else {
        echo "0 results";
    }
    echo "</table>";
    ?>