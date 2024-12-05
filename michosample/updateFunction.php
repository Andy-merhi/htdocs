<?php
include 'config.php';
$productID = $_POST['productID'];
if (isset($_POST['update'])) {
    $newprodName = $_POST['updatedName'];
    $newprodPrice = $_POST['updatedPrice'];
    // echo $newprodName;
    $queryUpdate = "UPDATE product SET prodName = '$newprodName',price = '$newprodPrice' WHERE productID = '$productID'";
    mysqli_query($con, $queryUpdate);
    mysqli_close($con);
}
