<?php
/////////////////////////////
define("db_SERVER", "localhost:3306");//define is used to declare constants
define("db_USER","root");//wrong username put root1
define("db_PASSWORD","");
define("db_DBNAME", "liudb");
$conn = mysqli_connect(db_SERVER,db_USER,db_PASSWORD,db_DBNAME);
if (!$conn){ 
 echo '<script type="text/javascript">
 alert("Error connecting the server '. mysqli_connect_error(). '<
 /script>';
} 
?>