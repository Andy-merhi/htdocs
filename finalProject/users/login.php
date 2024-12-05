<?php
include '../api_connection/config.php';
include 'cleanInputs.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = clean($_POST["username"], 25);
    $input_password = $_POST["password"];

    $sqlString = "SELECT * FROM users WHERE username='$input_username'";
    $result = mysqli_query($con, $sqlString);

    if ($result && mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);

        if (password_verify($input_password, $userData['Password'])) {
            $_SESSION['username'] = $userData['Username'];
            $_SESSION['userID'] = $userData['UserID'];

            echo '<script type="text/javascript">
                    alert("Login Successful");
                    window.location.href = "../dashboard.php";
                  </script>';
        } else {
            echo '<script type="text/javascript">
                    alert("Invalid password");
                  </script>';
        }
    } else {
        echo '<script type="text/javascript">
                alert("Invalid username");
              </script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CareerSpotlight</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Login">
            <input type="button" value="Register" onclick="window.location.href='register.php'">
        </form>
    </div>
</body>

</html>