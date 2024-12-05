<?php
    include "config.php";
    if(isset($_POST['del'])){
        $code =$_POST['code'];
        mysqli_query($con,"delete from `major` where code ='$code'");
    }
?>
