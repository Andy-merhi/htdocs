<?php

session_start();

?>

<!DOCTYPE html>
<html >

<body>
<?php
if(isset($_POST["submit"])){
    $_SESSION["Username"] = $_POST["name"];
    echo $_SESSION["Username"]."<br>";
}

$_SESSION["gender"] = "male";

echo "Session variables are set . <br>";


?>
</body>
</html>

<form method="POST">

<label for="name">Name:</label>
<input type="text" name="name"><br>

<input type="submit" value="Submit" name="submit">

</form>
