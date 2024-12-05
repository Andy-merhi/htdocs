<?php 
include 'config.php';
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

            <label for="phoneName">Phone Name: </label>
            <input type="text" name="phoneName" id="phoneName"><br>
        
            <label for="phonePrice">Price: </label>
            <input type="text" name="phonePrice" id="phonePrice"><br>

            <label for="phoneMadeIn">Made in: </label>
            <input type="text" name="phoneMadeIn" id="phoneMadeIn"><br>
        

            <label for="phoneImage">Phone Image</label>
            <input type="file" name="phoneImage" id="phoneImage"><br>
        
            <input type="submit" id="submitPhone" value="submit" name = "submitPhone">
            

    </form>
</body>

</html>