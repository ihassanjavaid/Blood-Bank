<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="GetBloodEnterStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>
<body>
<div class = "box">

    <?php

    $GroupID = $_POST['GroupID'];
    $TypeID = $_POST['TypeID'];

    $_SESSION['GroupID'] = $GroupID;
    $_SESSION['GroupID'] = $TypeID;

    $conn = mysqli_connect("localhost", "root", "", "bb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = " SELECT * FROM blood NATURAL JOIN bloodgroup NATURAL JOIN bloodtype NATURAL JOIN cost";
    $result = $conn->query($query);

    $empDetails = mysqli_fetch_assoc($result);

    $delQuery = " select max(BloodID) as bID from ( select * from blood where bloodtypeID =2 and groupID = 2 ) bld ";
    $resultDel = $conn->query($delQuery);
    $fetchRes = mysqli_fetch_assoc($resultDel);
    $bID = $fetchRes['bID'];

    $finalDelQuery = " DELETE from Blood where BloodID = '$bID' " ;
    $dispatch = mysqli_query($conn, $finalDelQuery);

    if ( !$empDetails ) {
        //header("Location: DonorDetails.php");
        echo "False";
    }

    echo  "  
            
             <h1>Blood Details</h1>
             <h3>Blood ID Ref: $bID</h3>
             <h3>Blood Group: ".$empDetails['groupname']." </h3>
             <h3>Blood Type: ".$empDetails['typeOfBlood']. "</h3>
             <h3>Description: ".$empDetails['description']." </h3>   
             <h3>Cost: ".$empDetails['costamount']. " Rupees</h3>
             <h3></h3>
          
          ";
    ?>

</div>

<div class = "box3">
    <li><a href="Main.php">< Back</a></li>
</div>

</body>
</html>
