<?php
session_start();

$ID = $_POST['CNIC'];
$pass = $_POST['pass'];

$_SESSION['CNIC'] = $ID;
$_SESSION['pass'] = $pass;

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "bb";

$_SESSION ['host']= $host;
$_SESSION['dbUsername'] = $dbUsername;
$_SESSION['dbPassword'] = $dbPassword;
$_SESSION['bb'] = $dbname;

$conn = new mysqli($_SESSION['host'], $_SESSION['dbUsername'], $_SESSION['dbPassword'], $_SESSION['bb']);
$_SESSION['conn']=$conn;
$query1 = mysqli_query($conn, "Select CNIC, password from bb.donor where CNIC = $ID and password = '$pass' ");

if ($query1 == false ){
    echo mysqli_error($conn);
}

$row = mysqli_fetch_assoc($query1);

$CNIC = $row['CNIC'];
$loginpass = $row['password'];

//echo $CNIC, $loginpass;

if( $CNIC == $ID && $loginpass == $pass ) {

    /*
    $host = "localhost";
    $dbUsername = "Employee";
    $dbPassword = "";
    $dbname = "mydb";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    $_SESSION['conn'] = $conn;
    */

    header('Location: DonorMain.php');

}

else{
    header('Location: DonorLogin.php');
}

?>


