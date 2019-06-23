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

    $hospID = $_POST['hospID'];
    $add = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = $_POST['phone'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $capacity = $_POST['storage'];

    $contactIDquery = "select max(ContactID) as nextIDct from contact";
    $contactIDresult = mysqli_query($conn, $contactIDquery);
    $resContact = mysqli_fetch_assoc($contactIDresult);
    $contactID = $resContact['nextIDct'];
    $contactID += 1;

    $bbIDquery = "select max(BloodBankID) as nextIDbb from bloodbank ";
    $bbIDresult = mysqli_query($conn, $bbIDquery);
    $resbb = mysqli_fetch_assoc($bbIDresult);
    $bbID = $resbb['nextIDbb'];
    $bbID += 1;

}

$query1 = "INSERT INTO bb.contact VALUES
('$contactID', '$add', '$phone', '$email', '$city', '$country')";

$query2 = "INSERT INTO bb.bloodbank VALUES
('$bbID', '$capacity', '$contactID')";



$result1 = mysqli_query($conn, $query1);

if($result1){

    $result2 = mysqli_query($conn, $query2);

    if ($result2) {

        $flag = true;

        if ( $hospID != 0 ){

            $query3 = "INSERT INTO bb.hospital_has_bloodbank VALUES
            ('$hospID', '$bbID' )";
            $result3 = mysqli_query($conn, $query3);
            $flag = $result3;

        }

        if ($flag) {

            echo "Success!";
            header("Location: Success.php");

        }

    }
}

else{
    echo "Error entering Data!";
}

?>

