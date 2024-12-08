<?php

require_once("../config.php");
// ইনপুট ডেটা
$currency = $_POST['currency'];
$price = $_POST['price'];
$cpt = $_POST['cpt'];
$bdt = $_POST['bdt'];
$fee = $_POST['fee'];
$methoads = $_POST['methoads'];
$accno = $_POST['accno'];
$country = $_POST['country'];
$adminid = $_POST['adminid'];
$adminname = $_POST['adminname'];
$adminpin = $_POST['adminpin'];
$adminimg = $_POST['adminimg'];
$transition = $adminid . $adminpin . $cpt . date('si');
$statust = "pending";
$statuscolor = "ff3d3a";
$postdate = date('d-m-y');
// SQL ইনসার্ট
$sql = "INSERT INTO transactions (currency, price, cpt, bdt, fee, methoads, accno, country, adminid, adminname, adminpin, adminimg, transition , statust , statuscolor, postdate) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssssssssssssss",
    $currency,
    $price,
    $cpt,
    $bdt,
    $fee,
    $methoads,
    $accno,
    $country,
    $adminid,
    $adminname,
    $adminpin,
    $adminimg,
    $transition,
    $statust,
    $statuscolor,
    $postdate
);

if ($stmt->execute()) {

} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Doto&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice :: Psend</title>
    <style>
        h1,
        h2,
        h3,
        p {
            margin: 0;
        }
    </style>

</head>

<body style='font-family: "Doto", sans-serif;'>
    <section style="display: flex; justify-content: space-around;">
        <div>
            <hr>
            <center>
                <h2> <?php echo $transition ?></h2>
                <h3>Successfully Send pay!</h3>
                <p>thank you <?php echo $adminname ?>!</p>
                You received money. call via <br> IMO/WhatsApp: 01877357091
            </center>
            <blockquote>
                <div style="">
                    <small>
                        Date : <?php echo $postdate ?><br>
                        Methods : <?php echo $methoads ?><br>
                        Acc NO : <?php echo $accno ?><br>
                        Send : <?php echo $cpt . " " . $currency ?><br>
                        BDT : <?php echo $bdt ?> BDT<br>
                        Fee : <?php echo $fee ?><br>
                        country : <?php echo $country ?><br>
                        <center><br>
                            <div id="qrcode"></div>
                        </center>
                    </small>
                </div>
            </blockquote>
            <br>
            <div style="height: 15px; width: 30px; background-color: #000;"></div>
            <hr>
            <br><br><br>
            <center> <button onclick="window.location.href='/'">GO Back</button> <button
                    onclick="print()">Print</button></center>
        </div>
    </section>
    <script>
        const host = window.location.host;
        const url = host + "/invoice/?id=<?php echo $transition ?>";
        const qrcodeContainer = document.getElementById('qrcode');
        new QRCode(qrcodeContainer, {
            text: url,
            width: 70,
            height: 70,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H,
        });
    </script>
</body>

</html>