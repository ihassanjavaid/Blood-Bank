<html>

<head>
    <meta charset="utf-8">
    <title>Hospital - Login</title>
    <link rel="stylesheet" type="text/css" href="HospLoginStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>

<div class= "backclass">
    <a href = "Main.php" class="backbutton">< Back</a>
</div>

<div class="box">
    <h2>Hospital Login</h2>

    <form action="HospAuth.php" method="POST">

        <div class="inputBox">
            <input type="number" name="hospID" required="">
            <label>Hospital ID</label>
        </div>

        <div class="inputBox">
            <input type="password" name="pass" required="">
            <label>Password</label>
        </div>

        <input type="submit" name="" value="Log In">
    </form>
</div>
</body>
</html>