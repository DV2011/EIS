<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <?php
    require('../Database/config.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']); 
        $username = mysqli_real_escape_string($mysqli, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($mysqli, $password);
        // Check user is exist in the database
        $sql = "SELECT * FROM `users` WHERE username='$username'
                AND password='" . md5($password) . "'";
        $result = $mysqli->query($sql);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user home page
            header("location: ../Inventory/home.php");
        } else {
            echo "<div class='form'>
                <h3>Incorrect username or password.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                </div>";
        }
    } else {
    ?>
        <form class="form" method="POST" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link"><a href="registration.php">New Registration</a></p>
            <p class="link"><a href="../index.html">Back to front page</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>