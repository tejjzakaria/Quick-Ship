<?php
require 'config.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM user_parcels WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    if($result){
        header('Location: parcels_users.php');
    }
    else{
        die(mysqli_error($conn));
    }
}







?>