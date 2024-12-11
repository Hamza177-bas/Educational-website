
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administrateur</title>
</head>
<body>
<?php 
include('conn.php');

$query = mysqli_query($conn, "SELECT * FROM `pays`");


while ($row = mysqli_fetch_array($query)) {
    echo "ID: " . $row['id'] . "<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Population: " . $row['population'] . "<br>";
    echo "Languages: " . $row['languages'] . "<br>";
    echo "Continent ID: " . $row['id_continent'] . "<br><br>";
}
?>


<script src="script.js"></script>
</body>
</html>