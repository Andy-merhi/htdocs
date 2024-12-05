<?php
include 'config.php';
if (isset($_POST['add'])) {
    $id = $_POST['prodID'];
    $prodName = $_POST['prodName'];
    $prodPrice = $_POST['prodPrice'];
    $catName = $_POST['catName'];
    $prodImage = $_FILES['prodImage']['tmp_name'];

    $add = "INSERT INTO product (productID,prodName,catID,price) VALUES(NULL,'$prodName','$catName','$prodPrice')";
    $res = mysqli_query($con, $add);
    if ($res) {

        // if ($_FILES['fileInput']['error'] == UPLOAD_ERR_OK) {
        $targetDir = 'images/';
        $targetFile = $targetDir . basename($_FILES['prodImage']['name']);

        if (move_uploaded_file($prodImage, $targetFile)) {
            echo 'File uploaded successfully.';
        } else {
            echo 'Error uploading file.';
        }
        // } else {
        //     echo 'Error: ' . $_FILES['fileInput']['error'];
        // }

        // $targetDir = 'images/';
        // $targetFile = $targetDir . basename($_FILES['prodImage']['name']);
        // move_uploaded_file($_FILES['prodImage']['temp_name'], $targetFile);

        echo "Product added";
    } else {
        echo "product not added!";
    }
}
