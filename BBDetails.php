<html>

<head>
    <meta charset="utf-8">
    <title>Blood Bank Details</title>
    <link rel="stylesheet" type="text/css" href="BBDetailsStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>

<div class= "backclass">
    <a href = "AdminMain.php" class="backbutton">< Back</a>
</div>

<div class="box">
    <h2>Blood Bank Info</h2>

    <form action="BBinfo.php" method="POST">

    <div class="inputBox">
        <input type="number" name="bbID" required="">
        <label>Blood Bank ID</label>
    </div>

    <input type="submit" name="" value="Search">
    </form>
</div>
</body>
</html>