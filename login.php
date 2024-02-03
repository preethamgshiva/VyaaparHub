<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<img src="images/logo.png" alt="">
    <div class="wrapper">
    <?php
        if (isset($_POST["submit"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["users"] = "yes";
                    header("Location: home.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form method="post" action="login.php">
            <h1>Login</h1>
            <div class="input-box">
                <label for=""></label>
                <input type="email"  required name="email" placeholder="Email">
            </div>
            <div class="input-box">
                <label for=""></label>
                <input type="password"  required name="password" placeholder="Password">
            </div>
            <input type="submit" class="btn" name="submit">Login
            <div class="register-link">
                <p>Don't have an account ?
                <a href="registration.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
