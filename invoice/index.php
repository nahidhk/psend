<?php
$tid = $_GET['id'];

require_once('../config.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM transactions WHERE transition = $tid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<script>window.location.href='id';</script>";
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice :: Psend</title>
    <link rel="stylesheet" href="/style.css">
</head>
<style>
    .box1 {
        width: 25%;
        background-color: red;
    }

    .box2 {
        width: 25%;
        background-color: green;
    }

    h1,
    h2,
    h3,
    h4 {
        margin: 0;
    }

    @media only screen and (max-width: 600px) {
        
    }
</style>

<body>
    <div class="nav flex beet">
        <div>
            <blockquote class="flex">
                <span class="navtext">Psend - </span><span><?php echo $row['adminname'] ?></span>
            </blockquote>
        </div>
        <div>
            <div class="cimg">
                <img src="/img/<?php echo $row['adminimg'] ?>" alt="Logo">
            </div>
        </div>
    </div>
    <br><br><br><br>
    <section class="flex anaround">
        <div class="flex over ">
            <div class="box1">
                <h3>Form</h3>
            </div>
            <div class="box2">
                <h3>TO</h3>
            </div>

        </div>
    </section>



</body>

</html>