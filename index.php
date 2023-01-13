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
    <title>Dashboard - QuickShip</title>
    <link rel="icon" href="Files/icon.png">
    <script src="https://kit.fontawesome.com/840bf4aa09.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
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
        <h1>Overview</h1>
        <div class="overview">
            
            <div class="containerOverviewTabs">
                <div class="wrapper">
                    <h4>New Parcels</h4>
                    <h2>222</h2>
                </div>
                
                <i class="fa-solid fa-plus iconOverviewTab"></i>
            </div>

            <div class="containerOverviewTabs">
                <div class="wrapper">
                    <h4>Ready for shipping</h4>
                    <h2>60</h2>
                </div>
                <i class="fa-solid fa-box-open iconOverviewTab"></i>
            </div>

            <div class="containerOverviewTabs">
                <div class="wrapper">
                    <h4>In transit</h4>
                    <h2>109</h2>
                </div>
                <i class="fa-solid fa-truck iconOverviewTab"></i>
            </div>

            <div class="containerOverviewTabs lastContainerOverviewTab">
                <div class="wrapper">
                    <h4>Delivered</h4>
                    <h2>3691</h2>
                </div>
                <i class="fa-solid fa-check-to-slot iconOverviewTab"></i>
            </div>
            
        </div>
        <div class="parcelsList">
            <div class="containerParcelsList">
                <div class="wrapper2">
                    <h1>Recent Parcels</h1>
                    <a href="">View All</a>
                </div>
                <table>
                    <thead>
                            <tr>
                                <th>Destination</th>
                                <th>Recipient</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Marrakech</td>
                            <td>Issam AIT</td>
                            <td>300 dhs</td>
                            <td id="deliveredStatus"><a href="">Delivered</a></td>
                        </tr>
                        <tr>
                            <td>Marrakech</td>
                            <td>Issam AIT</td>
                            <td>300 dhs</td>
                            <td id="returnedStatus"><a href="">Returned</a></td>
                        </tr>
                        <tr>
                            <td>Marrakech</td>
                            <td>Issam AIT</td>
                            <td>300 dhs</td>
                            <td id="inTransitStatus"><a href="">In Transit</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="containerParcelsList containerGeneralStats">
                <div class="wrapper2">
                    <h1>General Stats</h1>
                </div>
                
                <div class="wrapper4">
                    <h4>All Parcels : 3999</h4>
                </div>
                <div class="containerStats">
                    <div class="wrapper3">
                        <h4>Returned</h4>
                        <progress id="stat1" value="23" max="100"></progress>
                    </div>
                    <div class="wrapper3">
                        <h4>Delivered</h4>
                        <progress id="stat2" value="72" max="100"></progress>
                    </div>
                    <div class="wrapper3">
                        <h4>In Transit</h4>
                        <progress id="stat3" value="20" max="100"></progress>
                    </div>
                </div>
            </div>
        </div>
        <div class="parcelsList bottomTables">
            <div class="containerParcelsList">
                <div class="wrapper2">
                    <h1>Non Invoiced Parcels</h1>
                </div>
                <table>
                    <thead>
                            <tr>
                                <th>Status</th>
                                <th>%</th>
                                <th>Parcels</th>
                                <th>CRBT</th>
                                <th>Frais</th>
                                <th>Total</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="deliveredStatus"><a href="">Delivered</a></td>
                            <td>0%</td>
                            <td>0</td>
                            <td>0</td>
                            <td>-0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td id="returnedStatus"><a href="">Returned</a></td>
                            <td>0%</td>
                            <td>0</td>
                            <td>0</td>
                            <td>-0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>0%</td>
                            <td>0</td>
                            <td>0</td>
                            <td>-0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="containerParcelsList containerGeneralStats">
                <div class="wrapper2">
                    <h1>Invoiced Parcels</h1>
                </div>
                <table>
                    <thead>
                            <tr>
                                <th>Status</th>
                                <th>%</th>
                                <th>Parcels</th>
                                <th>CRBT</th>
                                <th>Frais</th>
                                <th>Total</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="deliveredStatus"><a href="">Delivered</a></td>
                            <td>0%</td>
                            <td>0</td>
                            <td>0</td>
                            <td>-0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td id="returnedStatus" class="nonDelivered"><a href="">Non Delivered</a></td>
                            <td>0%</td>
                            <td>0</td>
                            <td>0</td>
                            <td>-0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>0%</td>
                            <td>0</td>
                            <td>0</td>
                            <td>-0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
                
                
            </div>
        </div>
        
        <!--
        <div class="parcelsList invoicedParcelsTable">
            <div class="containerParcelsList">
                <div class="wrapper2">
                    <h1>Non Invoiced Parcels</h1>
                </div>
                <table>
                    <thead>
                            <tr>
                                <th>Status</th>
                                <th>%</th>
                                <th>Parcels</th>
                                <th>CRBT</th>
                                <th>Frais</th>
                                <th>Total</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="deliveredStatus"><a href="">Delivered</a></td>
                            <td>0%</td>
                            <td>0</td>
                            <td>0</td>
                            <td>-0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td id="returnedStatus"><a href="">Returned</a></td>
                            <td>0%</td>
                            <td>0</td>
                            <td>0</td>
                            <td>-0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>0%</td>
                            <td>0</td>
                            <td>0</td>
                            <td>-0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
        -->
        
        
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!--
    
    <section>
        <div class="searchBar">
            <input type="text" name="searchBar" id="searchBar" placeholder="Search by tracking number">
            
        </div>
        <h1 id="overviewText">Overview</h1>
        <div class="overview">
            
            <fieldset id="newPackages">
                <div class="inline">
                    <h4>New Parcels</h4>
                    <h2>222</h2>
                </div>
                <i class="fa-solid fa-plus overviewIcons"></i>
            </fieldset>
            <fieldset id="newPackages">
                <div class="inline">
                    <h4>Ready for shipping</h4>
                    <h2>60</h2>
                </div>
                <i class="fa-solid fa-box-open overviewIcons"></i>
            </fieldset>
            <fieldset id="newPackages">
                <div class="inline">
                    <h4>In transit</h4>
                    <h2>2000</h2>
                </div>
                <i class="fa-solid fa-truck overviewIcons"></i>
            </fieldset>
            <fieldset id="newPackages">
                <div class="inline">
                    <h4>Delivered</h4>
                    <h2>3600</h2>
                </div>
                <i class="fa-solid fa-check-to-slot overviewIcons"></i>
            </fieldset>
        </div>
        <div class="parcel_generalStats">
            <div class="containerParcelTable">
                <div class="parcelsTable">
                    <h1>Parcels</h1>
                    <a href="">View All</a><br><br>

                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Destination</td>
                            <td>Recipient</td>
                            <td>Price</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>AGADIR</td>
                            <td>AHMED SAID</td>
                            <td>300 DHS</td>
                            <td id="deliveredStatus"><a href="">Delivered</a></td>
                        </tr>
                        <tr>
                            <td>MARRAKECH</td>
                            <td>AYOUB AKI</td>
                            <td>99 DHS</td>
                            <td id="intransitStatus"><a href="">In Transit</a></td>
                        </tr>
                        <tr>
                            <td>TANGIER</td>
                            <td>AYMANE J</td>
                            <td>599 DHS</td>
                            <td id="returnedStatus"><a href="">Returned</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="containerParcelTable">
                <div class="parcelsTable">
                    <h1>General Stats</h1>
                </div>
                
                <div class="progressBars">
                    <h6>In Transit</h6>
                    <progress id="progressBar2" value="15" max="100"></progress>
                </div>
                <div class="progressBars">
                    <h6>Delivered</h6>
                    <progress id="progressBar1" value="74" max="100"></progress>
                </div>
                <div class="progressBars lastBar">
                    <h6>Returned</h6>
                    <progress id="progressBar3" value="11" max="100"></progress>
                </div>
            </div>
        </div>
        <div class="parcel_generalStats invoicedNonInvoiced">
            <div class="containerParcelTable">
                <div class="parcelsTable">
                    <h1>Invoiced Parcels</h1>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Status</td>
                            <td>Frais</td>
                            <td>Total</td>
                            <td>%</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="deliveredStatus"><a href="">Delivered</a></td>
                            <td>-0</td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        
                        <tr>
                            <td id="returnedStatus"><a href="">Returned</a></td>
                            <td>-0</td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr id="totalTr">
                            <td id="total"><a href="">TOTAL</a></td>
                            <td>-0</td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="containerParcelTable">
                <div class="parcelsTable">
                    <h1>Invoiced Parcels</h1>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Status</td>
                            <td>Frais</td>
                            <td>Total</td>
                            <td>%</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="deliveredStatus"><a href="">Delivered</a></td>
                            <td>-0</td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        
                        <tr>
                            <td id="returnedStatus"><a href="">Non Delivered</a></td>
                            <td>-0</td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr id="totalTr">
                            <td id="total"><a href="">TOTAL</a></td>
                            <td>-0</td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

-->



</body>
</html>