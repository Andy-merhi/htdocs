<?php
    include "config.php";
    if(isset($_POST['edit'])){
        $code =$_POST['code'];      
        $description =$_POST['description'];
        mysqli_query($con,"update `major` set description ='$description' where code ='$code'");
    }
?>
