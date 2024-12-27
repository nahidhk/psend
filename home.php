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


<!-- add the the mobile mobile apk run nav  -->
 
    <!-- Psend mobile nav -->
    <div class="nav flex center">
        <div class="cmbui flex anaround">
            <div>
                <h2>
                    Psend 
                </h2>
            </div>
            <div class="cimg">
                <img src="/img/<?php echo $row['img'] ?>" alt="Logo">
            </div>
        </div>
    </div>
<!-- ui change and the add mobile version apk -->

<section class="flex center">
    <main class="mbui">

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
        <div>
            <input class="input" oninput="searchData()" type="search" id="search" placeholder="Input your id"> &nbsp;
            <span onclick="window.location.href='/invoice/id/'" style="padding: 5px;  border: 1px solid #4680ff; background-color: #f306b8; border-radius: 4px; color: #fff;cursor: pointer;"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>
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
                            <th>Acc No</th>
                            <th>C>A> Cash</th>
                            <th>BD Taka</th>
                            <th>Date</th>
                            <th>price</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody id="app">
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="flex anaround <?php echo $row['diso'] ?>" style=" height: 100vh; width: 100%; background-color: #fff; position: fixed; top: 0;">
        <div><br><br><br><br>
            <div class="popup">
                <center>
                    <h2>Upload Profile photo</h2>
                </center>
                <form id="frrom" action="upload.php?id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
                    <input class="false" type="text" name="imgname" value="<?php echo $row['img'] ?>">
                    <input oninput="submitfrm()" type="file" class="input" name="image" accept="image/*">
                </form>
                <script>
                    function submitfrm() {
                        document.getElementById('frrom').submit();
                    }
                </script>
                </form>
            </div>
        </div>
    </section>
     <!-- end the mobile ui -->
     </main>
     </section>
<?php include("bottom.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"
        integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="que.js"></script>
    <script src="app.js"></script>
    <script src="login.js"></script>
    <script src="tabshow.js"></script>
    <script>
        sessionStorage.setItem("name", "<?php echo $row['name'] ?>");
        sessionStorage.setItem("pin", "<?php echo $row['pin'] ?>");
        sessionStorage.setItem("img", "<?php echo $row['img'] ?>");
        sessionStorage.setItem("id", "<?php echo $row['id'] ?>");
    </script>
</body>

</html>