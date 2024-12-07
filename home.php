<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
$pin = $_SESSION['pin'] ?? null; 

if ($pin === null) {
    echo "<script>alert('Session has expired or no PIN found.'); window.location.href='login.php';</script>";
    exit; 
}
require_once("config.php"); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("SELECT * FROM admins WHERE pin = ?");
$stmt->bind_param("i", $pin); 
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<script>alert('Error: Invalid PIN'); window.location.href='login.php';</script>";
    exit;
}

$stmt->close();
$conn->close();
?>


<head>
    <link rel="shortcut icon" href="/img/Psend Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psend</title>
</head>

<body>
    <!-- Psend mobile nav -->
    <div class="nav flex beet">
        <div>
            <blockquote class="flex">
                <span class="navtext">Psend - </span><span><?php echo $row['name']?></span>
            </blockquote>
        </div>
        <div>
            <div class="cimg">
                <img src="/img/<?php echo $row['img'] ?>" alt="Logo">
            </div>
        </div>
    </div>
    <br><br><br>
    <center>
        <h3>
            <span id="showflag"></span><br><span id="countryshow">Loadding...</span><br>
            <span style="color: #468;border: 1px solid red;" id="liveDateTime"></span>
        </h3>
    </center>

    <section class="flex center">
        <div class="boxdz">
            <center>
                <input id="setloc" class="inputg" list="country" type="text" placeholder="Select country">
                TO
                <input class="inputg" type="text" value="Bangladesh">
            </center>
            <datalist id="country">
                <option value="Saudi Arabia"></option>
                <option value="United Arab Emirates (Dubai)"></option>
                <option value="Malaysia"></option>
            </datalist>
        </div>
    </section>
    <br>
    <section style="height: 50px;" class="flex anaround">
        <button id="shbtn">
            Loadding... 
        </button>

    </section>
    
    <section class="flex anaround">
        <div class="tabelbox">
            <div class="pendbox">
                <center>
                    Order List
                </center>
            </div>
            <div style="overflow: scroll;">
                <table class="minimalistBlack">
                    <thead>
                        <tr>
                            <th>T.ID</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>C>A> Cash</th>
                            <th>BD Taka</th>
                            <th>price</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><button
                                    style="border: none;background-color: coral;color: #fff; border-radius: 4px;">Confrom</button>
                            </td>
                            <td>nahidhk</td>
                            <td>20/10/2024</td>
                            <td>100</td>
                            <td>200</td>
                            <td>300</td>
                            <td><img style="height: 40px;width: 40px;border-radius: 100px;border: 1px solid #4680ff;"
                                    src="/img/PsendLogo.gif"></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><button
                                    style="border: none;background-color: coral;color: #fff; border-radius: 4px;">Confrom</button>
                            </td>
                            <td>nahidhk</td>
                            <td>20/10/2024</td>
                            <td>100</td>
                            <td>200</td>
                            <td>300</td>
                            <td><img style="height: 40px;width: 40px;border-radius: 100px;border: 1px solid #4680ff;"
                                    src="/img/PsendLogo.gif"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>



    <!-- js  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"
        integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="app.js"></script>
    <script src="login.js"></script>
</body>

</html>