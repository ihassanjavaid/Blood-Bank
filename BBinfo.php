<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="BBinfoStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>
<body>
<div class = "box">

    <?php

    $bbID = $_POST['bbID'];

    $_SESSION['bbID'] = $bbID;

    $conn = mysqli_connect("localhost", "root", "", "bb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = " SELECT * FROM bloodbank natural join contact where BloodBankID = '$bbID' ";
    $result = $conn->query($query);


    $empDetails = mysqli_fetch_assoc($result);

    if ( !$empDetails )
        header("Location: BBDetails.php");

    echo  "  
            
             <h1>Details</h1>
             <h3>Blood Bank ID: ".$empDetails['BloodBankID']." </h3>
             <h3>Storage Capacity: ".$empDetails['storageCapacity']." </h3>   
       
             <h3></h3>
              
             <h1>Contact Details</h1>
             <h3>Phone No: ".$empDetails['phoneNo']." </h3>
             <h3>E-Mail: ".$empDetails['email']." </h3>
             <h3>Address: ".$empDetails['address']. " " .$empDetails['city']. " " .$empDetails['country'].   " </h3>
          
          ";
    ?>

</div>

<div class = "box3">
    <li><a href="Main.php">< Back</a></li>
</div>

<div class = "box4" >

    <a href="DelBB.php" class="button2">Delete</a>

</div>

</body>
</html>