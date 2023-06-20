<?php
session_start();

include "connect.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $password = md5($password);

    $sql = "SELECT * FROM `admin_users` WHERE `email`='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $pwd = $row['password'];

    if ($password == $pwd) {
        $_SESSION['username'] = $username;
        header("location: index.php");
    } else {
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style.css">
    <title>CAA | Log In</title>
</head>
<body>

    <div id="login_bg">
        <div class="login_content">
            <form autocomplete="disabled" name='form_action' class="form-signin" action="login.php" method="POST">
                <h1 class="logo"><img src="logo.png" alt="BidZWon"></h1>

                <h1 class="sign-label h3 mb-3 font-weight-normal text-white">Admin - Please sign in</h1>
                <label for="username" class="sr-only">Username</label>
                <input autocomplete="disabled" type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">

                <label for="password" class="sr-only">Password</label>
                <input autocomplete="new-password" type="password" name="password" id="password" class="form-control" placeholder="Password" required="">

                <input type="hidden" name="login" id="login" value="yes">
                <button name="submit" class="sign-button btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>

</body>
</html>
