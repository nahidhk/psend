<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'img/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = basename($_POST['imgname']); 
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedFileTypes)) {
            $destinationPath = $uploadDir . $fileName;
            if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                require_once('./config.php');
                date_default_timezone_set("Asia/Dhaka");
                $id = intval($_GET['id']); 
                $dis = "vcc";
                $sql = "UPDATE admins SET diso= ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("si", $dis, $id);
                    if ($stmt->execute()) {
                        echo "<br><br><h1><center>Loading...</center></h1>";
                    } else {
                        error_log("Error updating record: " . $stmt->error);
                        echo "Error updating record.";
                    }
                    $stmt->close();
                } else {
                    error_log("Error preparing statement: " . $conn->error);
                    echo "Database error.";
                }

                mysqli_close($conn);
            } else {
                error_log("Failed to move file: $fileTmpPath to $destinationPath");
                echo "File upload failed. Please check permissions.";
            }
        } else {
            echo "Only JPG, PNG, and GIF files are allowed.";
        }
    } else {
        echo "No file uploaded or an error occurred.";
    }
} else {
    echo "Invalid request method.";
}
?>
<script>
    setTimeout(function () {
        window.location.href = '/home.php';
    }, 2000);  
</script>
