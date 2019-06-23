<html>

<head>
    <meta charset="utf-8">
    <title>Donor Details</title>
    <link rel="stylesheet" type="text/css" href="DonorDetailsSyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>

<div class= "backclass">
    <a href = "Main.php" class="backbutton">< Back</a>
</div>

<div class="box">
    <h2>Donor Information</h2>

    <form action="DonorInfo.php" method="POST">

    <div class="inputBox">
        <input type="number" name="CNIC" required="">
        <label>CNIC</label>
    </div>

    <input type="submit" name="" value="Search">
    </form>
</div>
</body>
</html>