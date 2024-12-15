<?php
require_once('../config.php'); 
$id = $_GET['id'];
$sql = "DELETE FROM transactions WHERE id = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $id); 
    if ($stmt->execute()) {
        echo "<script>window.location.href='/admin/admin.html'</script>";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}
$conn->close(); 
?>
