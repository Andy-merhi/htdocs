<?php
include '../api_connection/config.php';
include 'cleanInputs.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = clean($_POST["username"], 25);
    $input_password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $input_fname = clean($_POST["fname"], 255);
    $input_lname = clean($_POST["lname"], 255);

    $sqlString = "SELECT * FROM users WHERE Username='$input_username'";
    $result = mysqli_query($con, $sqlString);

    if (mysqli_num_rows($result) > 0) {
        echo '<script type="text/javascript">
                alert("This username is already taken");
            </script>';
    } else {
        $sqlString = "INSERT INTO users (Username, Password, fname, lname) VALUES ('$input_username', '$input_password', '$input_fname', '$input_lname')";
        $result = mysqli_query($con, $sqlString);
        echo '<script type="text/javascript">
                alert("Signup Successful");
                window.location.href = "../users/login.php";
            </script>';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>CareerSpotlight</title>
    <link rel="stylesheet" href="../css/register.css">
</head>

<body>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <label for="fname">First Name:</label>
            <input type="text" name="fname" required><br>

            <label for="lname">Last Name:</label>
            <input type="text" name="lname" required><br>
            
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Create Account">
            <a href="./login.php">
                <p>&lt;back to login</p>
            </a>
        </form>
    </div>
</body>

</html>