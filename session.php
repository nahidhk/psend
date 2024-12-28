<?php
 session_start(); 
    $pin = $_SESSION['pin'] ?? null;
    if ($pin === null) {
        echo "<script>alert('Session has expired or no PIN found.'); window.location.href='login.php';</script>";
        exit;
    }
 ?>