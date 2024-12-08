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
    echo "<script>window.location.href='/invoice/id/?id={$tid}';</script>";
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
    .box1,
    .box2 {
        width: 50%;
    }
    .box2{
        border-left: 1px solid #000;
    }
    h1,
    h2,
    h3,
    h4 {
        margin: 0;
    }
    .over {
        width: 80%;
    }
    .flexover {
        display: flex;
        padding: 10px;
        box-shadow: 0 0 3px 0 #000;
        border-radius: 6px;
    }
    .fill {
        border-bottom: 1px dotted #000;
    }
    .shh {
        text-align: center;
        border-radius: 10px;
    }
    @media only screen and (max-width: 600px) {
        .box1,
        .box2 {
            width: 100%;
        }

        .flexover {
            display: block;
        }
        .box2{
        border-left: none;
    }
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
        <div class="flexover over ">
            <div class="box1">
                <center>
                    <h3>Form</h3>
                </center>
                <hr>
                <blockquote>
                    <p>
                        <strong>transactions id: <?php echo $tid ?></strong> <br>
                        <strong>Name:</strong>&nbsp;<span class="fill"><?php echo $row['adminname'] ?></span><br>
                        <strong>Send:</strong>&nbsp;&nbsp;<span
                            class="fill"><?php echo $row['cpt'] . ".00&nbsp;" . $row['currency'] ?></span><br>
                        <strong>price poll today:</strong>&nbsp;&nbsp;<span
                            class="fill"><?php echo $row['price'] . "&nbsp;" ?>BDT</span><br>
                        <strong>fees:</strong>&nbsp;&nbsp;<span
                            class="fill"><?php echo $row['fee'] . "&nbsp;" ?>BDT</span><br>
                        <strong>send methods:</strong>&nbsp;<span class="fill"><?php echo $row['methoads'] ?></span><br>
                        <strong>Accounts Number:</strong>&nbsp;<span class="fill"><?php echo $row['accno'] ?></span><br>
                        <strong>country:</strong>&nbsp;<span class="fill"><?php echo $row['country'] ?></span><br>
                        <strong>Mobile:</strong>&nbsp;<span class="fill"><i>NULL</i></span><br>
                    </p>
                </blockquote>
            </div>
            <div class="box2">
                <center>
                    <h3>TO</h3>
                </center>
                <hr>
                <blockquote>
                    <p>
                        <strong>invoice id: <?php echo $row['id'] ?></strong> <br>
                        <strong>Name:</strong>&nbsp;Nahidul Islam</span><br>
                        <strong>Receved:</strong>&nbsp;&nbsp;<span class="fill"><?php echo $row['bdt'] ?> BDT
                        </span><br>
                        <strong>price poll today:</strong>&nbsp;&nbsp;<span
                            class="fill"><?php echo $row['price'] . "&nbsp;" ?>BDT</span><br>
                        <strong>send methods:</strong>&nbsp;<span class="fill"><?php echo $row['methoads'] ?></span><br>
                        <strong>Accounts Number:</strong>&nbsp;<span class="fill"><?php echo $row['accno'] ?></span><br>
                        <strong>country:</strong>&nbsp;<span class="fill"> Bangladesh</span><br>
                        <strong>Mobile:</strong>&nbsp;<span class="fill"><i>+880 018 77 3570 91 -
                            </i>IMO/WhatsApp</span><br>
                    <div style="border: 1px solid #4680ff; padding: 6px;">
                        Working/Status
                        <hr>
                        <div class="shh"
                            style="background-color: #<?php echo htmlspecialchars($row['statuscolor'], ENT_QUOTES, 'UTF-8'); ?>; padding: 10px; color:#fff;">
                            <?php echo $row['statust'] ?>
                        </div>
                    </div>
                    </p>
                </blockquote>
        </div>
        </div>
    </section>
</body>

</html>