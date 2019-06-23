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

    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $add = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = $_POST['phone'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $contactIDquery = "select max(ContactID) as nextIDct from contact";
    $contactIDresult = mysqli_query($conn, $contactIDquery);
    $resContact = mysqli_fetch_assoc($contactIDresult);
    $contactID = $resContact['nextIDct'];
    $contactID += 1;

    $hIDquery = "select max(HospitalID) as nextIDh from hospital ";
    $hIDresult = mysqli_query($conn, $hIDquery);
    $resH = mysqli_fetch_assoc($hIDresult);
    $hID = $resH['nextIDh'];
    $hID += 1;

    $bbID = $_POST['bbID'];

}

$query1 = "INSERT INTO bb.contact VALUES
('$contactID', '$add', '$phone', '$email', '$city', '$country')";

$query2 = "INSERT INTO bb.hospital VALUES
('$hID', '$name', '$contactID', '$pass' )";

$result1 = mysqli_query($conn, $query1);

if($result1){

    $result2 = mysqli_query($conn, $query2);

    if ($result2) {

        $flag = true;

        if ( $bbID != 0  ) {

            $bbquery = " INSERT INTO bb.hospital_has_bloodbank values ('$hID', '$bbID') ";
            $result3 = mysqli_query($conn, $bbquery);
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