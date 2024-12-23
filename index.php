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
<!-- Change the ui mobel -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .popup {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .input {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btnlg {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btnlg:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="popup">
        <h3>Login</h3>
        <form id="djfrm" action="" method="post">
            <input id="pin" class="input" type="number" name="pin" placeholder="Input your PIN" required><br>
            <button type="submit" class="btnlg">Login</button>
        </form>
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

        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>

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
