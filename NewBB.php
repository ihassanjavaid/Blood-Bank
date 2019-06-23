<html>
<head>
    <meta charset="utf-8">
    <title>New Blood Bank</title>
    <link rel="stylesheet" type="text/css" href="NewBBStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>
<div class="box1">

    <h2>Blood Bank Registration</h2>

    <form action="BBReg.php" method="POST">

        <div class="inputBox">
            <input type="number" name="hospID" required="">
            <label>Hospital's ID ( to which this is connected )</label>
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
            <input type="number" name="storage"  required = "">
            <label>Storage Capacity</label>
        </div>

        <input type="submit" name="" value="Register">

    </form>

</div>

</body>
</html>