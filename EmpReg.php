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

    $desig = mysqli_real_escape_string($conn, $_POST['desig']);
    $jDate = mysqli_real_escape_string($conn, $_POST['jdate']);
    $scale = $_POST['scale'];
    $mgrID = $_POST['mgrID'];
    $brID = $_POST['brID'];

    $contactIDquery = "select max(ContactID) as nextIDct from contact";
    $contactIDresult = mysqli_query($conn, $contactIDquery);
    $resContact = mysqli_fetch_assoc($contactIDresult);
    $contactID = $resContact['nextIDct'];
    $contactID += 1;

    $empIDquery = "select max(empID) as nextIDemp from employee";
    $empIDresult = mysqli_query($conn, $empIDquery);
    $resEmp = mysqli_fetch_assoc($empIDresult);
    $empID = $resEmp['nextIDemp'];
    $empID += 1;

}

$query1 = "INSERT INTO bb.contact VALUES
('$contactID', '$add', '$phone', '$email', '$city', '$country')";

$query2 = "INSERT INTO bb.person VALUES
('$CNIC', '$firstName', '$lastName', '$dob', '$gender', '$age', '$contactID')";


$query3 = "INSERT INTO bb.employee VALUES
('$empID', '$desig', '$scale', '$jDate', '$mgrID', '$CNIC', '$brID', '$pass')";


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
    sleep(5);
}

?>