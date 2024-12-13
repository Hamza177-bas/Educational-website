<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $namedata = "data_africia";
    $conn = new mysqli($servername, $username, $password, $namedata);


    $sql = "SELECT * FROM pays";
    $res = mysqli_query($conn,$sql);
    $pays = mysqli_fetch_all($res,MYSQLI_ASSOC);

    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
    if (isset($_POST['submit'])) {
        $nome = $_POST['nom'];
        $type = $_POST['City'];
        $namepays = $_POST['pays'];  
        // echo $nome;
        $stmt = "INSERT INTO vill (name, type, id_pays) VALUES ('$nome', '$type', '$namepays')";
        mysqli_query($conn,$stmt);

    }
    $conn->close();
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="bg-[#C27D27] shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            
            <div class="text-white text-2xl font-bold uppercase tracking-wider">
                Africa <span class="text-[#6B3E26]">Vibes</span>
            </div>

            <ul class="hidden md:flex space-x-8">
                <li><a href="index.php" class="text-white text-lg font-medium uppercase hover:text-[#F1C40F] transition duration-300">Home</a></li>
                <li><a href="Admin.php" class="text-white text-lg font-medium uppercase hover:text-[#F1C40F] transition duration-300">Administrateur</a></li>
                <li><a href="Utilis.php" class="text-white text-lg font-medium uppercase hover:text-[#F1C40F] transition duration-300">Utilisateur</a></li>
        </ul>

        <div id="mobile-menu" class="md:hidden hidden bg-[#C27D27] ">
            <ul class="space-y-4 py-4 px-6">
                <li><a href="#home" class="text-white text-lg font-medium uppercase hover:text-[#F1C40F] transition duration-300">Home</a></li>
                <li><a href="#about" class="text-white text-lg font-medium uppercase hover:text-[#F1C40F] transition duration-300">About</a></li>
                <li><a href="#services" class="text-white text-lg font-medium uppercase hover:text-[#F1C40F] transition duration-300">Services</a></li>
            </ul>
        </div>
    </nav>
    <div class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Add Village Information</h2>
        <form action="insertvill.php" method="POST" class="space-y-4">
            <div>
                <input type="text" name="nom" placeholder="Name" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <select name="City" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Capital City">Capital City</option>
                    <option value="Famous City">Famous City</option>
                </select>
            </div>
            <div>
                <select name="pays" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php 
                    foreach($pays as $pay) :?>
                        <option value="<?= $pay["id"] ?>"><?= $pay["name"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" value="Submit" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </form>
    </div>
    </div>
    <footer class="bg-[#6B3E26] text-white text-center py-4">
        <p>&copy; 2024 Explore Africa | All Rights Reserved</p>
    </footer>
</body>
</html>
