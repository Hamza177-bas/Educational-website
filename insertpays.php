<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insertpays.php" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="population" placeholder="Population" required>
        <input type="text" name="languages" placeholder="Languages" required>
        <input type="submit" name="submit"> 
    </form>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $namedata = "data_africia";
    
    $conn = new mysqli($servername, $username, $password, $namedata);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $population = $_POST['population'];
        $languages = $_POST['languages'];
        $id_con=1;

        $stmt = $conn->prepare("INSERT INTO pays (name, population, languages, id_continent) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sisi", $name, $population, $languages,$id_con);
        if ($stmt->execute()) {
            // echo "New record inserted successfully!";
        } else {
            echo "Error:" . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
