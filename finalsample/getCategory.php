<?php
include 'config.php';
$queryCat = "SELECT * FROM catid";
$res = mysqli_query($con, $queryCat);
echo "<option>Select Category</option>";
while ($row = mysqli_fetch_array($res)) {
    echo "<option id = " . $row['CatID'] . " value = " . $row['CatID'] . ">" . $row['CatName'] . "</option>";
}

mysqli_close($con);
