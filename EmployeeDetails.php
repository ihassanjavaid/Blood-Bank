<html>

<head>
    <meta charset="utf-8">
    <title>Employee Details</title>
    <link rel="stylesheet" type="text/css" href="EmployeeDetailsStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>

<div class= "backclass">
    <a href = "AdminMain.php" class="backbutton">< Back</a>
</div>

<div class="box">
    <h2>Employee Information</h2>

    <form action="EmpInfo.php" method="POST">
        <div class="inputBox">
            <input type="number" name="CNIC" required="">
            <label>CNIC</label>
        </div>

        <input type="submit" name="" value="Search">
    </form>
</div>
</body>
</html>