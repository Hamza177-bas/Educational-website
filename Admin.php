
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

$pays = mysqli_query($conn, "SELECT * FROM `pays`");


$vill =mysqli_query($conn,"SELECT * FROM `vill`");
$continent =mysqli_query($conn,"SELECT * FROM `continent`");
while ($row = mysqli_fetch_array($pays)) {
    echo "ID: " . $row['id'] . "<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Population: " . $row['population'] . "<br>";
    echo "Languages: " . $row['languages'] . "<br>";
    echo "Continent ID: " . $row['id_continent'] . "<br><br>";
}
   echo "<h2> VILL </h2>";
    while($row =mysqli_fetch_array($vill)){
        echo "ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "type: " . $row['type'] . "<br>";
        echo "id_pays: " . $row['id_pays'] . "<br>" ."<br>";
    }
   echo "<h2> Continent </h2>";
   while($row =mysqli_fetch_array($continent)){
        echo "ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
   }
?>


<script src="script.js"></script>
</body>
</html>