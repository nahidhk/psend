<?php 
require_once('../config.php');
$id = intval($_POST['id']);
$sendbdt = floatval($_POST['sendbdt']);
$sendaccno = mysqli_real_escape_string($conn, $_POST['sendaccno']);
$duebdt = floatval($_POST['duebdt']);
$trx = mysqli_real_escape_string($conn, $_POST['trx']);
$typex = mysqli_real_escape_string($conn, $_POST['typex']);
$sql = "UPDATE transactions SET sendbdt = ?, sendaccno = ?, duebdt = ?, trx = ?, typex = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("dsdssi", $sendbdt, $sendaccno, $duebdt, $trx, $typex, $id);
    if ($stmt->execute()) {
        echo "";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}
mysqli_close($conn);
?>
<script>window.location.href='/admin/admin.html'</script>
