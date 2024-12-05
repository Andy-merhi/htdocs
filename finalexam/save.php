<?php
include 'config.php';
include 'AddPhone.php';

if(isset($_POST['submitPhone'])){
    $name = $_POST['phoneName'];
    $phoneMadeIn = $_POST['phoneMadeIn'];
    $phonePrice = $_POST['phonePrice'];
   
    $targetDir = 'PhoneImage/';
    $targetFile = $targetDir . basename($_FILES['phoneImage']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $upload = 1;

    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $upload=0;
    }
    
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $upload=0;
    }

    if($upload == 0){
        echo "Sorry, error in file";
    }
    else{
        if (move_uploaded_file($_FILES["phoneImage"]["tmp_name"], $targetFile)) {
            $filename = basename($_FILES["phoneImage"]["name"]);
            $filepath = $targetFile;
    
            $addPhone = "INSERT INTO phones (PhoneID,PhoneName,MadeIn,Price,PhoneImage) VALUES(NULL,'$name','$phoneMadeIn','$phonePrice','$filepath')";
            $result = mysqli_query($con, $addPhone);
    
            if ($result) {
                echo "product added successfuly";
            } else {
                echo "error adding product";
            }
        }
        else{
            echo "error in sql";
        }
    }
    
}
else{
    echo "error  in image";
}


?>