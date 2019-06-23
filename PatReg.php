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

    $CNIC = $_POST['CNIC'];
    $firstName = mysqli_real_escape_string($conn, $_POST['f_name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['l_name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = $_POST['Gender'];
    $age = $_POST['age'];
    $add = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = $_POST['phone'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $bloodGroup = mysqli_real_escape_string($conn, $_POST['bGrp']);
    $hospID = $_POST['hospID'];
    $hist = mysqli_real_escape_string($conn, $_POST['hist']);

    $contactIDquery = "select max(ContactID) as nextIDct from contact";
    $contactIDresult = mysqli_query($conn, $contactIDquery);
    $resContact = mysqli_fetch_assoc($contactIDresult);
    $contactID = $resContact['nextIDct'];
    $contactID += 1;

    $patIDquery = "select max(PatientID) as nextIDpat from patient ";
    $patIDresult = mysqli_query($conn, $patIDquery);
    $resPat = mysqli_fetch_assoc($patIDresult);
    $patID = $resPat['nextIDpat'];
    $patID += 1;

    $grpID = 9; // default undefined value;

    if ( $bloodGroup == "A-positive")
        $grpID = 1;
    else if ( $bloodGroup == "O-positive")
        $grpID = 2;
    else if ( $bloodGroup == "B-positive")
        $grpID = 3;
    else if ( $bloodGroup == "A-negative")
        $grpID = 4;
    else if ( $bloodGroup == "O-negative")
        $grpID = 5;
    else if ( $bloodGroup == "B-negative")
        $grpID = 6;
    else if ( $bloodGroup == "AB-positive")
        $grpID = 7;
    else if ( $bloodGroup == "AB-negative")
        $grpID = 8;
    else
        $grpID = 9;
}

$query1 = "INSERT INTO bb.contact VALUES
('$contactID', '$add', '$phone', '$email', '$city', '$country')";

$query2 = "INSERT INTO bb.person VALUES
('$CNIC', '$firstName', '$lastName', '$dob', '$gender', '$age', '$contactID')";


$query3 = "INSERT INTO bb.patient VALUES
('$patID', '$hist', '$CNIC', '$grpID', '$hospID', '$pass')";


$result1 = mysqli_query($conn, $query1);

if($result1){

    $result2 = mysqli_query($conn, $query2);

    if ($result2) {

        $result3 = mysqli_query($conn, $query3);

        if ($result3){

            echo "Success!";
            header("Location: Success.php");

        }
    }
}

else{
    echo "Error entering Data!";
}

?>