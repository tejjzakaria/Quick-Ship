<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or email has already been taken'); </script>";
    }
    else{
        if($password == $confirmPassword){
            $query = "INSERT INTO users (`fullName`, `phoneNumber`, `email`, `username`, `password`) VALUES ('$fullName', '$phoneNumber', '$email', '$username', '$password')";
            
            $result = mysqli_query($conn, $query);
            if (!$result) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }
            if (mysqli_affected_rows($conn) > 0) {
                echo
                "<script> alert('Registration Successful'); </script>";
            } else {
                // insert failed
                echo
                "<script> alert('Error: Registration Failed'); </script>";
            }
        }
        else{
            echo
            "<script> alert('Passwords do not match'); </script>";

        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - QuickShip</title>
    <link rel="icon" href="Files/icon.png">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <center>
        
        <fieldset id="sign_up_fieldset">
            <h1>Become A<br>Customer</h1>
            <form action="" method="post" autocomplete="off">
                <ul>
                    <li><input type="text" name="fullName" id="fullName" placeholder="Full Name"></li>
                    <li><input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Phone Number"></li>
                    <li><input type="email" name="email" id="email" placeholder="Email"></li>
                    
                    <li><input type="text" name="username" id="username" placeholder="Username"></li>
                    <li><input type="password" name="password" id="password" placeholder="Password"></li>
                    <li><input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password"></li>
                    <li><input type="submit" name="submit" id="submit" value="Sign Up"></li>
                    <hr><hr>
                    <li><h5>Already have an account?<br><a href="sign_in.php">Sign In</a></h5></li>
                </ul>
            </form>
        </fieldset>
    </center>
</body>
</html>