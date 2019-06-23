<html>

<head>
    <meta charset="utf-8">
    <title>Donate Blood</title>
    <link rel="stylesheet" type="text/css" href="DonateBloodStyle.css" media="screen">
    <link rel="icon" href="pics/icon.png" />
</head>

<body>
<div class="box1">

    <h2>Donate Blood</h2>

    <form action="DonateBloodEnter.php" method="POST">

        <div class="selection">
            <select name = "GroupID" required="">Group ID
                <option>Group ID</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
            </select>
        </div>

        <div class="selection">
            <select name = "TypeID" required="">Type ID
                <option>Type ID</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>

        <div class="inputBox">
            <input type="number" name="bbID"  required = "" >
            <label>Blood Bank ID</label>
        </div>

        <div class="inputBox">
            <input type="text" name="rDate" required="">
            <label>Recieval Date</label>
        </div>

        <div class="inputBox">
            <input type="text" name="expDate" required = "">
            <label>Expiry Date</label>
        </div>


        <input type="submit" name="" value="Donate!">

</form>

</div>


</body>
</html>