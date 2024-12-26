<?php
session_start();

require_once("config.php");

$sql = "SELECT pin, name, img FROM admins";
$result = $conn->query($sql);

$adminData = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $adminData[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
<!-- Change the ui mobe -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || Page</title>
    
</head>
<body>
    <section class="flex center">
    <div class="mbui">
        <br><br><br><br>
       <div class="flex anaround">
        <div class="center txcenter">
            <img src="/img/Psend Logo.png" alt="" class="logimg">
        <h3>Login</h3>
        <form id="djfrm" action="" method="post">
            <input id="pin" class="input" type="number" name="pin" placeholder="Input your PIN" required><br>
            <button type="submit" class="btnlg">Login</button>
        </form>
        </div>
       </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputPin = $_POST['pin'] ?? null;
            $matchingAdmin = array_filter($adminData, fn($admin) => $admin['pin'] === $inputPin);
            $_SESSION['pin'] = $inputPin;
            if (!empty($matchingAdmin)) {
                $_SESSION['user'] = reset($matchingAdmin); 
                echo "<script>window.location.href='home.php'; sessionStorage.setItem('verif',true);</script>"; 
                exit;
            } else {
                $error = "Invalid PIN!";
            }
        }
        ?>
<br><br><br>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>
    </section>

    <script>
      
        const adminData = <?= json_encode($adminData); ?>; 

        document.getElementById("djfrm").addEventListener("submit", function (e) {
            let inputPin = document.getElementById("pin").value;
            let matchingAdmin = adminData.find(admin => admin.pin === inputPin);

            if (!matchingAdmin) {
                e.preventDefault(); 
                alert("Invalid PIN! Please try again.");
            }
        });
    </script>
</body>
</html>
