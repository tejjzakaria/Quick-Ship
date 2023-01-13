<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: sign_in.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcels - QuickShip</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="Files/icon.png">
    <script src="https://kit.fontawesome.com/840bf4aa09.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <img src="Files/logo.png" alt="" id="logo">
        <nav>
            <ul>
                <li><a href="index.php"><i class="fa-solid fa-house"></i>Dashboard</a></li>
                <li><a href="parcels_users.php"><i class="fa-solid fa-boxes-stacked"></i>Parcels</a></li>
                <li><a href=""><i class="fa-solid fa-box-archive"></i>Products</a></li>
                <hr>
                <li id="line"><a href=""><i class="fa-solid fa-headphones-simple"></i>Support</a></li>
                <li><a href=""><i class="fa-solid fa-gear"></i>Settings</a></li>

            </ul>
        </nav>
        <button id="addParcelBtn"><a href="add_new_parcel.php">+ Add Parcel</a></button>
        <div class="userInfo">
            <img src="Files/avatar.png" alt="" id="avatar">
            <legend><?php echo $row["fullName"]; ?><br><a href="logout.php">Log Out</a></legend>
        </div>
    </header>
    <section>
        <div class="searchBar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="searchBar" id="searchBar" placeholder="Search by tracking number">
        </div>
        <div class="wrapper2">
            <h1>Parcels List</h1>
            <a href="add_new_parcel.php">Add New</a>
        </div>
        <div class="containerParcelsList parcelPageTable">
            
            <table>
                <thead>
                        <tr>
                            <th>Tracking Number</th>
                            <th>Recipient</th>
                            <th id="paymentStatus">Payment</th>
                            <th>Status</th>
                            <th>City</th>
                            <th>Price</th>
                            <th>Info</th>
                            <th>Actions</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql = "SELECT * FROM user_parcels";
                    $result = mysqli_query($conn,$sql);

                    if($result){
                        
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $orderNumber = $row['orderNumber'];
                            $parcelType = $row['parcelType'];
                            $openDoNotOpen = $row['openDoNotOpen'];
                            $recipient = $row['recipient'];
                            $phoneNumber = $row['phoneNumber'];
                            $cityList = $row['cityList'];
                            $neighborhood = $row['neighborhood'];
                            $adresse = $row['adresse'];
                            $info = $row['info'];
                            $price = $row['price'];
                            $productNature = $row['productNature'];

                            echo '
                                <tr>
                                    <td>'.$orderNumber.'</td>
                                    <td>'.$recipient.'</td>
                                    <td id="unpaidStatus"><a href="">Unpaid</a></td>
                                    <td id="newParcelStatus"><a href="">New Parcel</a></td>
                                    <td>'.$cityList.'</td>
                                    <td>'.$price.'</td>
                                    <td>'.$info.'</td>
                                    <td>
                                        <a href="update_parcel.php?updateid='.$id.'"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="delete_parcel.php?deleteid='.$id.'"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            
                            
                            ';
                        }
                    }
                    
                    
                    ?>
                    <!--
                    <tr>
                        <td>1KLM44389X</td>
                        <td>Issam AIT</td>
                        <td id="deliveredStatus"><a href="">Delivered</a></td>
                        <td>10/01/2023</td>
                        <td>AGADIR</td>
                        <td>300 DHS</td>
                        <td>Product 1</td>
                        <td><i class="fa-solid fa-pen-to-square"><a href=""></a></i><i class="fa-solid fa-trash"><a href=""></a></i></td>
                    </tr>
                    <tr>
                        <td>1KLM44389X</td>
                        <td>Issam AIT</td>
                        <td id="returnedStatus"><a href="">Returned</a></td>
                        <td>10/01/2023</td>
                        <td>AGADIR</td>
                        <td>300 DHS</td>
                        <td>Product 1</td>
                        <td><i class="fa-solid fa-pen-to-square"><a href=""></a></i><i class="fa-solid fa-trash"><a href=""></a></i></td>
                    </tr>
                    <tr>
                        <td>1KLM44389X</td>
                        <td>Issam AIT</td>
                        <td id="inTransitStatus"><a href="">In Transit</a></td>
                        <td>10/01/2023</td>
                        <td>AGADIR</td>
                        <td>300 DHS</td>
                        <td>Product 1</td>
                        <td><i class="fa-solid fa-pen-to-square"><a href=""></a></i><i class="fa-solid fa-trash"><a href=""></a></i></td>
                    </tr>
                    <tr>
                        <td>1KLM44389X</td>
                        <td>Issam AIT</td>
                        <td id="deliveredStatus"><a href="">Delivered</a></td>
                        <td>10/01/2023</td>
                        <td>AGADIR</td>
                        <td>300 DHS</td>
                        <td>Product 1</td>
                        <td><i class="fa-solid fa-pen-to-square"><a href=""></a></i><i class="fa-solid fa-trash"><a href=""></a></i></td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>