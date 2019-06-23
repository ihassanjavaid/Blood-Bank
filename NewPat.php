<html>
<head>
    <meta charset="utf-8">
    <title>New Patient</title>
    <link rel="stylesheet" type="text/css" href="NewPatStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>
<div class="box1">

    <h2>Patient Registration</h2>

    <h3>Personal Information</h3>

    <form action="PatReg.php" method="POST">
        <div class="inputBox">
            <input type="number" name="CNIC"  required = "" >
            <label>CNIC</label>
        </div>
        <div class="inputBox">
            <input type="text" name="f_name" required="">
            <label>First Name</label>
        </div>

        <div class="inputBox">
            <input type="text" name="l_name" required = "">
            <label>Last Name</label>
        </div>

        <div class="inputBox">
            <input type="text" name="dob" required="">
            <label>Date of Birth</label>
        </div>

        <div class="selection">
            <select name = "Gender" required="">
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>

        <div class="inputBox">
            <input type="number" name="age"  required = "">
            <label>Age</label>
        </div>

        <div class="inputBox">
            <input type="text" name="address" required="">
            <label>Address</label>
        </div>

        <div class="inputBox">
            <input type="text" name="phone" required="">
            <label>Phone No.</label>
        </div>

        <div class="inputBox">
            <input type="text" name="email" required="">
            <label>E-mail</label>
        </div>

        <div class="inputBox">
            <input type="text" name="city" required="">
            <label>City</label>
        </div>

        <div class="inputBox">
            <input type="text" name="country" required="">
            <label>Country</label>
        </div>

        <div class="inputBox">
            <input type="text" name="password"  required = "">
            <label>Password</label>
        </div>

</div>


<div class ="box2">
    <h3>Medical Details</h3>

    <div class="inputBox">
        <input type="text" name="bGrp" required="">
        <label>Blood Group</label>
    </div>

    <div class="inputBox">
        <input type="number" name="hospID" required="">
        <label>Hospital ID</label>
    </div>

    <div class="inputBox">
        <input type="text" name="hist" required="">
        <label>History</label>
    </div>

    <input type="submit" name="" value="Register">

    </form>

</div>
</body>
</html>