<?php
include 'config.php';

if(isset($_POST['submitProd'])){
    $id = $_POST['prodID'];
    $prodName = $_POST['prodName'];
    $prodPrice = $_POST['prodPrice'];
    $catName = $_POST['prodCat'];
   
    $targetDir = 'images/';
    $targetFile = $targetDir . basename($_FILES['prodImage']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        // $uploadOk = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        // $uploadOk = 0;
    }

    if (move_uploaded_file($_FILES["prodImage"]["tmp_name"], $targetFile)) {
        $filename = basename($_FILES["prodImage"]["name"]);
        $filepath = $targetFile;

        $addProd = "INSERT INTO product (productID,prodName,catID,price,imageName,imagePath) VALUES(NULL,'$prodName','$catName','$prodPrice','$filename','$filepath')";
        $result = mysqli_query($con, $addProd);

        if ($result) {
            echo "product added successfuly";
        } else {
            echo "error adding product";
        }

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.7.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>ADD PRODUCT</h1>
    <form action="" method="POST" enctype="multipart/form-data" id="fileUploadedId">

            <label for="productID">Product ID: </label>
            <input type="text" name="prodID" id="productID">
        
            <label for="prodName">Name: </label>
            <input type="text" name="prodName" id="prodName">
        
            <label for="prodPrice">Price: </label>
            <input type="text" name="prodPrice" id="prodPrice">
        
            <label for="prodCat">Category: </label>

            <select name="prodCat" id="prodCat">

            </select>
       
            <label for="prodImage">Product Image</label>
            <input type="file" name="prodImage" id="prodImage">
        
            <input type="submit" id="submitProd" value="submit" name = "submitProd">
            <input type="reset" value="reset" name="submit">

    </form>
</body>

<script>
 var optionSelected = 0;


$(document).ready(function() {
    $.ajax({
        url: 'getCategory.php',
        type: 'GET',
        success: function(response) {
            $('#prodCat').html(response);
        }
    })
});


// Catch the change event of the select field
$('#prodCat').change(function() {
    var selectedOption = $(this).val();
    optionSelected = selectedOption;
});


    
// $(document).on('click', '#submitProd',
//             function() {
//                 if ($('#productID').val() == "" || $('#prodName').val() == "" || $('#prodPrice').val() == "" || optionSelected == 0) {
//                     alert("empty fields");
//                 } else {
                    
//                     $prodID = $('#productID').val();
//                     $prodName = $('#prodName').val();
//                     $prodPrice = $('#prodPrice').val();
                    
//                     alert($prodID + ' ' + $prodName + ' ' + $prodPrice);
                    
//                     $.ajax({
//                         type: "POST",
//                         url: "save.php",
//                         data: {
//                             prodID: $prodID,
//                             prodName: $prodName,
//                             prodPrice: $prodPrice,
//                             catName: optionSelected,
//                             add: 1
//                         },
//                         success: function(response) {
//                             alert(response);
//                             $('#productID').val('');
//                             $('#prodName').val('');
//                             $('#prodPrice').val('');
//                         },
//                         error: function() {
//                             alert("error occured while adding an item");
//                         }

//                     });
//                 }
//             });

</script>

</html>