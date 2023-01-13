<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo
            "<script> alert('Wrong password'); </script>";
            
        }
    }
    else{
        echo
        "<script> alert('User not registered'); </script>";
    }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - QuickShip</title>
    <link rel="icon" href="Files/icon.png">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://kit.fontawesome.com/7e60a3b0f2.js" crossorigin="anonymous"></script>
</head>
<body>
    <center>
        
        <fieldset>
            <h1>Customer Area</h1>
            <form action="" method="post" autocomplete="off">
                <ul>
                    <li><input type="text" name="usernameemail" id="usernameemail" placeholder="Username or Email"></li>
                    <li><input type="password" name="password" id="password" placeholder="Password"></li>
                    <li><input type="submit" name="submit" id="submit" value="Sign In"></li>
                    <li><h5>Don't have an account? <a href="sign_up.php">Sign Up</a></h5></li>
                </ul>
            </form>
        </fieldset>
    </center>
</body>
</html>