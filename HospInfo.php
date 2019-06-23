<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="HospInfoStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>
<body>
<div class = "box">

    <?php

    $HospID = $_POST['hospID'];

    $_SESSION['hospID'] = $HospID;

    $conn = mysqli_connect("localhost", "root", "", "bb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = " SELECT * FROM hospital natural join contact where HospitalID = '$HospID' ";
    $result = $conn->query($query);


    $empDetails = mysqli_fetch_assoc($result);

    if ( !$empDetails ) {
        echo "Failed";
        //header("Location: HospDetails.php");
    }

    echo  "  
            
             <h1>Details</h1>
             <h3>Hospital ID: ".$empDetails['HospitalID']." </h3>
             <h3>Hospital Name: ".$empDetails['Hospitalname']." </h3>
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

    <a href="DelHosp.php" class="button2">Delete</a>

</div>

</body>
</html>