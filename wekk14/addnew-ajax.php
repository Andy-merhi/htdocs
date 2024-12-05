<?php
    include "config.php";
    if(isset($_POST['add'])){
        $code=$_POST['code'];
        $desc=$_POST['description'];
        
        mysqli_query($con,"insert into `major` (code, description) values ('$code', '$desc')");
    }
?>
