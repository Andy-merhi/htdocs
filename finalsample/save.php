<?php
include 'config.php';
if (isset($_POST['add'])) {
    $id = $_POST['prodID'];
    $prodName = $_POST['prodName'];
    $prodPrice = $_POST['prodPrice'];
    $catName = $_POST['catName'];

    $add = "INSERT INTO product (ProductID,ProdName,CatID,Price) VALUES(NULL,'$prodName','$catName','$prodPrice')";
    $result = mysqli_query($con, $add);
    if ($result) {
        echo "Product added";
    } else {
        echo "product not added!";
    }
}
