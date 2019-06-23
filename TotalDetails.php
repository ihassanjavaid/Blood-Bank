<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="TotalDetails.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>
<body>
<h1>Details</h1>
<div class = "box">
    <table>
        <tr>
            <th> Total Employees </th>
            <th> Total Donors </th>
            <th> Total Patients </th>
            <th> Total Hospitals </th>
            <th> Total Blood Banks </th>
        </tr>

        <?php

        $conn = mysqli_connect("localhost", "root", "", "bb");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $q1 = " select count(empID) as num from bb.employee";
        $result1 = $conn->query($q1);
        $emp = mysqli_fetch_assoc($result1);

        $q2 = " select count(donorID) as num from bb.donor";
        $result2 = $conn->query($q2);
        $donor = mysqli_fetch_assoc($result2);

        $q3 = " select count(CNIC) as num from bb.patient";
        $result3 = $conn->query($q3);
        $pat = mysqli_fetch_assoc($result3);

        $q4 = " select count(HospitalID) as num from bb.hospital";
        $result4 = $conn->query($q4);
        $hosp = mysqli_fetch_assoc($result4);

        $q5 = " select count(BloodBankID) as num from bb.bloodbank";
        $result5 = $conn->query($q5);
        $bank = mysqli_fetch_assoc($result5);

                echo
                    "<tr>
                            <th>".$emp['num']."</th>
                            <th> ".$donor['num']."</th>
                            <th>".$pat['num']."</th>
                            <th>".$hosp['num']."</th>
                            <th>".$bank['num']."</th>
                     </tr>";
        ?>

    </table>
</div>

<div class="midbox">
    <h1>Available Blood</h1>
</div>


<div class = box2>
    <table>
        <tr>
            <th>Blood Group</th>
            <th>Available Bags</th>
        </tr>

        <?php

        $conn = mysqli_connect("localhost", "root", "", "bb");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $queryForBB = "SELECT groupname, count(bloodID) as num from blood inner join bloodgroup using (GroupID) group by (GroupID) ";

        $result = $conn->query($queryForBB);

        if ($result-> num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo
                    "<tr>
                            <th>".$row['groupname']."</th>
                            <th> ".$row['num']."</th>
                     </tr>";
            }
        }
        else {
            echo "0 results";
        }
        ?>
    </table>
</div>

<div class = "box3">
    <li><a href="AdminMain.php">< Back</a></li>
</div>
</body>
</html>