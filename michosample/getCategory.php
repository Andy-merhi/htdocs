<?php
include 'config.php';
$queryCat = "SELECT * FROM category";
$res = mysqli_query($con, $queryCat);
echo "<option>Select Category</option>";
while ($row = mysqli_fetch_array($res)) {
    echo "<option id = " . $row['catID'] . " value = " . $row['catID'] . ">" . $row['catName'] . "</option>";
}

mysqli_close($con);

// echo $option;
