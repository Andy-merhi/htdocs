<?php
include 'config.php';
if (isset($_POST['del'])) {
    $productID = $_POST['productID'];
    $queryDelete = "DELETE FROM product WHERE productID = '$productID'";
    mysqli_query($con, $queryDelete);
}
