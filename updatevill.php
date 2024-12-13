<?php
include('conn.php');

if (isset($_POST['id']) && isset($_POST['name'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $id_pays = mysqli_real_escape_string($conn, $_POST['id_pays']);
    
    
    $update = mysqli_query($conn, "UPDATE `vill` SET `name` = '$name', `type` = '$type', `id_pays` = '$id_pays' WHERE `id` = '$id'");

    if ($update) {
        echo "valid!";
        header("Location: Admin.php"); 
        exit;
    } else {
        echo "novalid .";
    }
}
?>
