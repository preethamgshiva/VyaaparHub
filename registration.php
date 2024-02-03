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
    <link rel="stylesheet" href="register.css">
</head>
<body class="body1">
    <img src="logo.png" alt="logo">
    <div class="wrapper">
    <?php
        if (isset($_POST["submit"])) {
           $firstName = $_POST["fname"];
           $lastName = $_POST["lname"];
           $pn = $_POST["phno"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($firstName) OR empty($lastName) OR empty($pn) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (firstName, lastName, phno, email, password) VALUES ( ?, ?, ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssiss",$firstName, $lastName, $pn, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
       <div>
        <form action="registration.php" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <label for="" class="label">First Name:</label>
                <input type="text"required name="fname">
            </div>
            <div class="input-box">
                <label for="" class="label">Last Name:</label>
                <input type="text" required name="lname">
            </div>
            <div class="input-box">
                <label for="" class="label">Phone number:</label>
                <input type="number" required name="phno">
            </div>
            <div class="input-box">
                <label for="" class="label">E-Mail:</label>
                <input type="email" required name="email">
            </div>
            <div class="input-box">
                <label for="" class="label">Password:</label>
                <input type="password" required name="password">
            </div>
            <div class="input-box">
                <label for="" class="label">Re-Enter Password:</label>
                <input type="password" required name="repeat_password" >
            </div>
            <input type="submit" class="btn" name="submit">
            <div class="register-link">
                <p>Already have an account ?
                <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>
    </div>
</body>
</html>