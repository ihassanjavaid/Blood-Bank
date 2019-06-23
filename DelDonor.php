<?php
session_start();


if( isset( $_SESSION['CNIC'] )  ){

    $CNIC = $_SESSION['CNIC'];

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

$contQuery = "select ContactID from person natural join contact where CNIC = '$CNIC' ";
$contQueryRun = mysqli_query($conn, $contQuery);
$contQueryRes = mysqli_fetch_assoc($contQueryRun);
$contID = $contQueryRes['ContactID'];

$query1 = "Delete FROM bb.donor WHERE CNIC = '$CNIC' ";
$query2 = "Delete FROM bb.person WHERE CNIC = '$CNIC' ";
$query3 = "Delete FROM bb.contact WHERE contactID = '$contID' ";

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);

if( $result1 ==false ){
    echo mysqli_error($conn);
}

else{

    echo "Record Deleted!";
    sleep(5);
    header("Location: EmpInfo.php");

}


?>
