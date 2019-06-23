<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="DonorInfoStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>
<body>
<div class = "box">

    <?php

    $CNIC = $_POST['CNIC'];

    $_SESSION['CNIC'] = $CNIC;

    $conn = mysqli_connect("localhost", "root", "", "bb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = " select * from person natural join donor natural join contact natural join bloodgroup where CNIC = '$CNIC' ";
    $result = $conn->query($query);


    $empDetails = mysqli_fetch_assoc($result);

    if ( !$empDetails ) {
        //header("Location: DonorDetails.php");
        echo "False";
    }

    echo  "  
            
             <h1>Personal Details</h1>
             <h3>CNIC: ".$empDetails['CNIC']." </h3>
             <h3>Name: ".$empDetails['FirstName']. " " .$empDetails['LastName']." </h3>
             <h3>Date Of Birth: ".$empDetails['DOB']." </h3>   
             <h3>Gender: ".$empDetails['Gender']." </h3>
             <h3>Age: ".$empDetails['Age']." </h3>
             <h3></h3>
              
             <h1>Medical Details</h1>
             <h3>History: ".$empDetails['historyDescrption']." </h3>
             <h3>Branch ID: ".$empDetails['BranchID']." </h3>
             <h3>Blood Group: ".$empDetails['groupname']." </h3>
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

    <a href="Updatedonor.php" class="button1" >Update</a>
    <a href="DelDonor.php" class="button2">Delete</a>

</div>

</body>
</html>