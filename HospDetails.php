<html>

<head>
    <meta charset="utf-8">
    <title>Hospit Details</title>
    <link rel="stylesheet" type="text/css" href="HospDetailsStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>

<div class= "backclass">
    <a href = "Main.php" class="backbutton">< Back</a>
</div>

<div class="box">
    <h2>Hospital Information</h2>

    <form action="HospInfo.php" method="POST">

    <div class="inputBox">
        <input type="number" name="hospID" required="">
        <label>Hospital ID</label>
    </div>

    <input type="submit" name="" value="Search">
    </form>
</div>
</body>
</html>