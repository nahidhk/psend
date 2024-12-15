<?php 
require_once('../config.php');
$id = $_POST['id'];
$price = $_POST['cpt'];
date_default_timezone_set("Asia/Dhaka");
$updatex = date("Y-m-d H:i:s A");
$sql = "UPDATE currencies SET price = ?, updatex = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("dsi", $price, $updatex, $id); 
    if ($stmt->execute()) {
        echo "<script>window.location.href='/admin/pool.html'</script>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}
mysqli_close($conn);
?>
