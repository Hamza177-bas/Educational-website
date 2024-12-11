
<?php
$servername = "localhost";
$username = "root";
$password = "";
$namedata="data_africia";

$conn = new mysqli($servername, $username, $password,$namedata);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

?>