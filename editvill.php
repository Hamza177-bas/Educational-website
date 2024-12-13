<?php
include('conn.php');

if (isset($_GET['id']) && isset($_GET['type']) && $_GET['type'] == 'vill') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $query = mysqli_query($conn, "SELECT * FROM `vill` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        echo "vill valide no.";
        exit;
    }
} else {
    echo "data no valide";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>modified vill</title>
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
         
               
    <form action="updatevill.php" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Edit Village Data</h2>
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium">Village Name:</label>
        <input type="text" name="name" value="<?= $row['name']; ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>
    <div class="mb-4">
        <label for="type" class="block text-gray-700 font-medium">Village Type:</label>
        <input type="text" name="type" value="<?= $row['type']; ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>
    <div class="text-center">
        <button type="submit" class="bg-[#C27D27] shadow-md text-white py-2 px-6 rounded-lg  focus:outline-none focus:ring-2 ">
            Update
        </button>
    </div>
</form>
<footer class="bg-[#6B3E26] text-white text-center py-4 mt-[8.9rem]">
        <p>&copy; 2024 Explore Africa | All Rights Reserved</p>
    </footer>
</body>
</html>
