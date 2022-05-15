<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <?php
    require('../Database/config.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($mysqli, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($mysqli, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($mysqli, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $sql = "INSERT into `users` (username, password, email, create_datetime)
                VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result = $mysqli->query($sql);
        if ($result) {
            echo "<div class='form'>
                <h3>You are registered successfully.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a></p>
                </div>";
        } else {
            echo "<div class='form'>
                <h3>Required fields are missing.</h3><br/>
                <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                </div>";
        }
    } else {
    ?>
        <form class="form" action="" method="POST">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="email" placeholder="Email Address">
            <input type="password" class="login-input" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>