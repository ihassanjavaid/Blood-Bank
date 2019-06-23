<?php
session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "bb";

$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

if($conn->connect_error){
    echo "Connection Error";
    //header("Location: Main.php");
}

else {

    $groupID = $_POST['GroupID'];
    $typeID = $_POST['TypeID'];
    $bbID = $_POST['bbID'];

    $rDate = mysqli_real_escape_string($conn, $_POST['rDate']);
    $expDate = mysqli_real_escape_string($conn, $_POST['expDate']);;


    $bloodIDquery = "select max(BloodID) as nextIDb from blood ";
    $bIDresult = mysqli_query($conn, $bloodIDquery);
    $resB = mysqli_fetch_assoc($bIDresult);
    $bID = $resB['nextIDb'];
    $bID += 1;

}

$query = "INSERT INTO bb.blood VALUES 
('$bID', '$rDate', '$expDate',  '$groupID', '$bbID', '$typeID') ";

$result = mysqli_query($conn, $query);

if($result){

   header("Location: Donated.php");

}

else{
    echo "Error entering Data!";
}

?>

