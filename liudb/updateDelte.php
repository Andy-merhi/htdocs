<h1>Week 6 Day 2 - More SQL Queries & PHP functions</h1>
<?php
//Queries that return values -->Select (mysqli_num_rows() to return the number of rows)
//Queries that doesnt return values -->INSERT UPDATE DELETE (mysqli_affected_rows() to check how mane record were affected)
($con = mysqli_connect("localhost:3306", "root", "", "liudb")) or
    die(
        "<p>Unable to connect to the database server.</p>" .
            mysqli_connect_error()
    );
//UPDATE
// $sqlString =
//     "UPDATE major SET description='Computer Sciences and Technology' WHERE code='CSCI'";
// ($QueryResult = mysqli_query($con, $sqlString)) or
//     die(
//         "<p>Unable to execute the query.</p>" .
//             "<p>Error code " .
//             mysqli_errno($con) .
//             ": " .
//             mysqli_error($con)
//     ) .
//         "</p>";
// echo "<p>Successfully updated" .
//     mysqli_affected_rows($con) .
//     " record(s).</p>";

//Select
$sqlString2 = "Select * FROM major";
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
echo "<table border=1><tr><th>Major Code</th><th>Major Description</th></tr>";
if (mysqli_num_rows($QueryResult2) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_array($QueryResult2)) {
        echo "<tr><td>" .
            $row["code"] .
            "</td><td>" .
            $row["description"] .
            "</td></tr>";
    }
} else {
    echo "0 results";
}
        echo "</table>";

// Important Exercise //

//Insert data in students before using this example
//Select

$sqlString3 = "SELECT ID, fname, lname, dob, address, email , description FROM student inner join major on student.major = major.code";
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
            "</td><td>" .
            $row["description"] .
            "</td></tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";

?>