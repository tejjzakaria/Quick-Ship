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

<?php



if(isset($_POST['submitNewParcel'])){
    $orderNumber = $_POST['orderNumber'];
    $parcelType = $_POST['parcelType'];
    $openDoNotOpen = $_POST['openDoNotOpen'];
    $recipient = $_POST['recipient'];
    $phoneNumber = $_POST['phoneNumber'];
    $cityList = $_POST['cityList'];
    $neighborhood = $_POST['neighborhood'];
    $adresse = $_POST['adresse'];
    $info = $_POST['info'];
    $price = $_POST['price'];
    $productNature = $_POST['productNature'];


    $sql = "INSERT INTO user_parcels (orderNumber, parcelType, openDoNotOpen, recipient, phoneNumber, cityList, neighborhood, adresse, info, price, productNature)
    VALUES ('$orderNumber', '$parcelType', '$openDoNotOpen', '$recipient', '$phoneNumber', '$cityList', '$neighborhood', '$adresse', '$info', '$price', '$productNature')";

    $result = mysqli_query($conn,$sql);
    if($result){
        header('Location: parcels_users.php');
    }
    else {
        die(mysqli_error($conn));
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parcel - QuickShip</title>
    <link rel="icon" href="Files/icon.png">
    <link rel="stylesheet" href="CSS/style.css">
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
        <h1>Add New Parcel</h1>
        <form action="" method="post" autocomplete="off">
            <div class="containerAddParcel">
                <div class="firstLine">
                    <button id="newParcel">New Parcel</button>
                    <input type="text" name="orderNumber" id="orderNumber" placeholder="Order N°" class="inputsNewParcelPage">
                    <select name="parcelType" id="parcelType" class="inputsNewParcelPage">
                        <option value="SimpleParcel">Simple Parcel</option>
                        <option value="StockParcel">Stock Parcel</option>
                    </select>
                    <select name="openDoNotOpen" id="openDoNotOpen" class="inputsNewParcelPage">
                        <option value="OpenParcel">Open Parcel</option>
                        <option value="DoNotOpenParcel">Do Not Open Parcel</option>
                    </select>
                </div>
                <div class="secondLine">
                    <input type="text" name="recipient" id="recipient" placeholder="Recipient" class="inputsNewParcelPage">
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="inputsNewParcelPage">
                </div>
                <div class="thirdLine">
                    <select name="cityList" id="cityList" class="inputsNewParcelPage">
                        <option value="Agadir">Agadir</option>
                        <option value="Al Hoceima">Al Hoceima</option>
                        <option value="Azilal">Azilal</option>
                        <option value="Beni Mellal">Beni Mellal</option>
                        <option value="Ben Slimane">Ben Slimane</option>
                        <option value="Boulemane">Boulemane</option>
                        <option value="Casablanca">Casablanca</option>
                        <option value="Chaouen">Chaouen</option>
                        <option value="El Jadida">El Jadida</option>
                        <option value="El Kelaa des Sraghna">El Kelaa des Sraghna</option>
                        <option value="Er Rachidia">Er Rachidia</option>
                        <option value="Essaouira">Essaouira</option>
                        <option value="Fes">Fes</option>
                        <option value="Figuig">Figuig</option>
                        <option value="Guelmim">Guelmim</option>
                        <option value="Ifrane">Ifrane</option>
                        <option value="Kenitra">Kenitra</option>
                        <option value="Khemisset">Khemisset</option>
                        <option value="Khenifra">Khenifra</option>
                        <option value="Khouribga">Khouribga</option>
                        <option value="Laayoune">Laayoune</option>
                        <option value="Larache">Larache</option>
                        <option value="Marrakech">Marrakech</option>
                        <option value="Meknes">Meknes</option>
                        <option value="Nador">Nador</option>
                        <option value="Ouarzazate">Ouarzazate</option>
                        <option value="Oujda">Oujda</option>
                        <option value="Rabat-Sale">Rabat-Sale</option>
                        <option value="Safi">Safi</option>
                        <option value="Settat">Settat</option>
                        <option value="Sidi Kacem">Sidi Kacem</option>
                        <option value="Tangier">Tangier</option>
                        <option value="Tan-Tan">Tan-Tan</option>
                        <option value="Taounate">Taounate</option>
                        <option value="Taroudannt">Taroudannt</option>
                        <option value="Tata">Tata</option>
                        <option value="Taza">Taza</option>
                        <option value="Tetouan">Tetouan</option>
                        <option value="Tiznit">Tiznit</option>
                    </select>
                    <input type="text" name="neighborhood" id="neighborhood" placeholder="Neighborhood" class="inputsNewParcelPage">
                </div>
                <div class="fourthLine">
                    <input type="text" name="adresse" id="adresse" placeholder="Adresse" class="inputsNewParcelPage">
                    <input type="text" name="info" id="info" placeholder="Comments" class="inputsNewParcelPage">
                </div>
                <div class="fifthLine">
                    <input type="number" name="price" id="price" placeholder="Price" class="inputsNewParcelPage">
                    <input type="text" name="productNature" id="productNature" placeholder="Product Nature" class="inputsNewParcelPage">
                </div>
                <div class="lastLine">
                    <input type="submit" name="submitNewParcel" id="addParcel" value="Add Parcel">
                </div>
        </form>
        </div>
    </section>
</body>
</html>