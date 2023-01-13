<?php


$con = new mysqli('localhost', 'root', '', 'quickship_db');

if(!$con){
    die(mysqli_error($con));
}


?>