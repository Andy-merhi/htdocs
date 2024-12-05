<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>

<?php
// Database connection
include 'config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //// Add this line before the move_uploaded_file call
    $target_dir = "uploads/";
    //make directory in php in case the target directory folder doesnt exist
    mkdir($target_dir, 0755, true);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    /* Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }*/

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // File uploaded successfully, now store information in the database
            $filename = basename($_FILES["fileToUpload"]["name"]);
            $filepath = $target_file;

            $sql = "INSERT INTO uploads (filename, filepath) VALUES ('$filename', '$filepath')";
            $queryResult=mysqli_query($conn,$sql);
            if ($queryResult) {
                echo "File uploaded successfully and record inserted into database.";
                showImage($filename);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function showImage($fname){
    $sql = "select filepath from uploads where filename='$fname'";
    $result=mysqli_query(  $GLOBALS['conn'] ,$sql);
        if ($result) {
            $row = mysqli_fetch_array($result);//1 row 
            $imgsrc=$row["filepath"];
            echo "<img src='$imgsrc'>";
        } 
        else{
            echo "there is something wrong in this function";
        }
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>