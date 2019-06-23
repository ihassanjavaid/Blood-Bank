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

    $CNIC = $_SESSION['CNIC'];
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


    $contactIDquery = "select ContactID from contact natural join employee where CNIC = '$CNIC' ";
    $contactIDresult = mysqli_query($conn, $contactIDquery);
    $contactIDfetch = mysqli_fetch_assoc($contactIDresult);
    $contactID = $contactIDfetch['ContactID'];

    $empIDquery = "select empID from employee where CNIC =  '$CNIC' ";
    $empIDresult = mysqli_query($conn, $empIDquery);
    $resEmp = mysqli_fetch_assoc($empIDresult);
    $empID = $resEmp['empID'];


}

$query1 = " update contact set address = '$add' , phoneNo = '$phone',
email = '$email', city = '$city', country = '$country' where contactID = '$contactID' ";

$query2 = " update person set FirstName = '$firstName', 
 LastName = '$lastName', DOB = '$dob', age = '$age' where CNIC = '$CNIC' ";


$query3 = " update employee set Designation = '$desig', Scale = 'scale', 
 JoiningDate = '$jDate', Manager_empID = '$mgrID',  password = '$pass', BranchID = '$brID' ";


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