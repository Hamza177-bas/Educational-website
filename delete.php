<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $delete = mysqli_query($conn,"DELETE FROM `vill` WHERE `id`=$id") ;// Get city ID from URL parameter
}

// if (mysqli_stmt_execute($delete)) {
//     // If the deletion is successful, redirect to a page with a success message
//     header("Location: http://localhost/Educational-website/Admin.php?message=" . urlencode("The city has been deleted successfully."));
// } else {
//     // If there is an error, show an error message
//     echo "Error deleting record: " . mysqli_error($conn);
// }

// Close the connection
// mysqli_stmt_close($delete);
// mysqli_close($conn);
?>
