<?php
define("db_SERVER", "localhost");
define("db_USER", "root");
define("db_PASSWORD", "");
define("db_DBNAME", "jobportal102");
define('USE_BCRYPT', true);

$con = mysqli_connect(db_SERVER, db_USER, db_PASSWORD, db_DBNAME);
if (!$con) {
    echo '<script type="text/javascript">
    alert("Error connecting the server ' . mysqli_connect_error() .
        '</script>';
}
