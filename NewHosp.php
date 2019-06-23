<html>
<head>
    <meta charset="utf-8">
    <title>New Hospital</title>
    <link rel="stylesheet" type="text/css" href="NewHospStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>
<div class="box1">

    <h2>Hospital Registration</h2>

    <form action="HospReg.php" method="POST">

        <div class="inputBox">
            <input type="text" name="name" required="">
            <label>Hospital's Name</label>
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

        <div class="inputBox">
            <input type="text" name="bbID"  required = "">
            <label>Associated Blood Bank ID ( if any )</label>
        </div>

        <input type="submit" name="" value="Register">

    </form>

</div>

</body>
</html>