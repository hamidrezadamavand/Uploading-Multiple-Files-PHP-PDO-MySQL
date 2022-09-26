<?php
include 'connection.php';

if (isset($_POST['ButtonUpload'])) {
    for ($i = 0; $i < count($_POST['fileName']); $i++) {
        $fileName = $_POST['fileName'][$i];

        $fileUpload = $_FILES['fileUpload']['name'][$i];
        $fileUpload_dir = $_FILES['fileUpload']['tmp_name'][$i];
        $fileUpload_type = $_FILES["fileUpload"]["type"][$i];
        $fileUpload_Size = $_FILES['fileUpload']['size'][$i];

        $fileUploadExt = strtolower(pathinfo($fileUpload, PATHINFO_EXTENSION));
        $fileUploadName = $fileUpload . "." . $fileUploadExt;

        move_uploaded_file($fileUpload_dir, "uploadFiles/" . $fileUploadName);

        $stmt = $conn->prepare("INSERT INTO uploadfile(filename , fileAddress)
                VALUES(:filename , :fileAddress)");
        $stmt->bindParam(':filename', $fileName);
        $stmt->bindParam(':fileAddress', $fileUploadName);
        $stmt->execute();
    }
    header("Location: index.php");
    exit;
}