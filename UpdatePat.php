<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "bb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$CNIC = $_SESSION['CNIC'];

$query = " select * from person natural join patient natural join contact natural join bloodgroup where CNIC = '$CNIC' ";
$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

?>



<html>
<head>
    <meta charset="utf-8">
    <title>Update Patient</title>
    <link rel="stylesheet" type="text/css" href="NewPatStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>
<div class="box1">

    <h2>Patient Update</h2>

    <h3>Personal Information</h3>
    <?php

    echo  "<h3>CNIC:  ".$_SESSION['CNIC']." </h3>"
    ?>

    <form action="UpdatedonorFinal.php" method="POST">


        <div class="inputBox">
            <input type="text" name="f_name" required="" value = <?php echo $row['FirstName'] ?> >
            <label>First Name</label>
        </div>

        <div class="inputBox">
            <input type="text" name="l_name" required = "" value = <?php echo $row['LastName'] ?>>
            <label>Last Name</label>
        </div>

        <div class="inputBox">
            <input type="text" name="dob" required="" value = <?php echo $row['DOB'] ?>>
            <label>Date of Birth</label>
        </div>

        <div class="selection">
            <select name = "Gender" required="">
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>

        <div class="inputBox">
            <input type="number" name="age"  required = "" value = <?php echo $row['Age'] ?>>
            <label>Age</label>
        </div>

        <div class="inputBox">
            <input type="text" name="address" required="" value = <?php echo $row['address'] ?>>
            <label>Address</label>
        </div>

        <div class="inputBox">
            <input type="text" name="phone" required="" value = <?php echo $row['phoneNo'] ?>>
            <label>Phone No.</label>
        </div>

        <div class="inputBox">
            <input type="text" name="email" required="" value = <?php echo $row['email'] ?>>
            <label>E-mail</label>
        </div>

        <div class="inputBox">
            <input type="text" name="city" required="" value = <?php echo $row['city'] ?>>
            <label>City</label>
        </div>

        <div class="inputBox">
            <input type="text" name="country" required="" value = <?php echo $row['country'] ?>>
            <label>Country</label>
        </div>

        <div class="inputBox">
            <input type="text" name="password"  required = "" value = <?php echo $row['password'] ?>>
            <label>Password</label>
        </div>

</div>


<div class ="box2">
    <h3>Medical Details</h3>

    <div class="inputBox">
        <input type="text" name="bGrp" required="" value = <?php echo $row['groupname'] ?>>
        <label>Blood Group</label>
    </div>

    <div class="inputBox">
        <input type="number" name="hospID" required="" value = <?php echo $row['HospitalID'] ?>>
        <label>Hospital ID</label>
    </div>

    <div class="inputBox">
        <input type="text" name="hist" required="" value = <?php echo $row['historyDescription'] ?>>
        <label>History</label>
    </div>

    <input type="submit" name="" value="Update">

    </form>

</div>
</body>
</html>