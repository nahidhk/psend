<?php 
require_once('../config.php');
$pin = $_POST['pin'];
$username = $_POST['username'];
$country = $_POST['country'];
$img = $_POST['img'];

$sql = 'INSERT INTO admins (pin , `name` , img , country) VALUES(?,?,?,?)';
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssss",
   $pin, $username, $img , $country
);

if ($stmt->execute()) {

} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
<script>window.location.href='/admin/admin.html'</script>