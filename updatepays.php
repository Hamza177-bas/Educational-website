<?php
include('conn.php');

if (isset($_POST['id']) && isset($_POST['name'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $population = mysqli_real_escape_string($conn, $_POST['population']);
    $languages = mysqli_real_escape_string($conn, $_POST['languages']);
    
    $update = mysqli_query($conn, "UPDATE `pays` SET `name` = '$name', `population` = '$population', `languages` = '$languages' WHERE `id` = '$id'");

    if ($update) {
        echo "valid  !";
        header("Location: Admin.php"); 
        exit;
    } else {
        echo "novalide";
    }
}
?>
