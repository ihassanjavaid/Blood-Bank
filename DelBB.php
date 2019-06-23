<?php
session_start();


if( isset( $_SESSION['bbID'] )  ){

    $bbID = $_SESSION['bbID'];

}

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "bb";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if($conn->connect_error){
    echo "CONNECTION ERROR!";
    sleep(5);
    header("Location: Main.php");
}

$contQuery = "select ContactID from bloodbank natural join contact where bloodbankID = '$bbID'; ";
$contQueryRun = mysqli_query($conn, $contQuery);
$contQueryRes = mysqli_fetch_assoc($contQueryRun);
$contID = $contQueryRes['ContactID'];

$query1 = "Delete FROM bb.hospital_has_bloodbank WHERE BloodBankID = '$bbID' ";
$query2 = "Delete FROM bb.bloodbank WHERE BloodBankID = '$bbID' ";
$query3 = "Delete FROM bb.contact WHERE ContactID = '$contID' ";

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);

if( $result1 ==false ){
    echo mysqli_error($conn);
}

else{

    echo "Record Deleted!";
    sleep(5);
    header("Location: BBDetails.php");

}


?>
