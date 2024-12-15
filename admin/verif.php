<?php 
require_once('../config.php');
date_default_timezone_set("Asia/Dhaka");

$id = $_GET['id'];
$statust = 'Confrom';
$statuscolor = '4680ff';

$sql = "UPDATE transactions SET statust = ?, statuscolor= ? WHERE id = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("ssi", $statust, $statuscolor, $id); 
    if ($stmt->execute()) {
        echo "<script>window.location.href='/admin/admin.html'</script>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}
mysqli_close($conn);
?>
