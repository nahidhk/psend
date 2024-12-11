<?php 
require_once('../config.php');

// Validate and sanitize POST data
$id = intval($_POST['id']);
$sendbdt = floatval($_POST['sendbdt']);
$sendaccno = mysqli_real_escape_string($conn, $_POST['sendaccno']);
$duebdt = floatval($_POST['duebdt']);
$trx = mysqli_real_escape_string($conn, $_POST['trx']);
$typex = mysqli_real_escape_string($conn, $_POST['typex']);

// Prepare the query
$sql = "UPDATE transactions SET sendbdt = ?, sendaccno = ?, duebdt = ?, trx = ?, typex = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind parameters
    $stmt->bind_param("dsdssi", $sendbdt, $sendaccno, $duebdt, $trx, $typex, $id);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Close the connection
mysqli_close($conn);
?>
