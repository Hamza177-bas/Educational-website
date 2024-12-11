
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administrateur</title>
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
<?php 
include('conn.php');

$pays = mysqli_query($conn, "SELECT * FROM `pays`");


$vill =mysqli_query($conn,"SELECT * FROM `vill`");
$continent =mysqli_query($conn,"SELECT * FROM `continent`");
?>

<div class="container mx-auto p-6">

<!-- Pays (Countries) Section -->
<h2 class="text-3xl font-bold text-center text-indigo-600 mb-6">Pays</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php while ($row = mysqli_fetch_array($pays)) { ?>
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800">ID: <?= $row['id']; ?></h3>
            <p class="text-gray-600">Name: <?= $row['name']; ?></p>
            <p class="text-gray-600">Population: <?= $row['population']; ?></p>
            <p class="text-gray-600">Languages: <?= $row['languages']; ?></p>
            <p class="text-gray-600">Continent ID: <?= $row['id_continent']; ?></p>
        </div>
    <?php }?>
</div>

<!-- Vill (Villages) Section -->
<h2 class="text-3xl font-bold text-center text-indigo-600 mt-12 mb-6">Villages</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php while ($row = mysqli_fetch_array($vill)) { ?>
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800">ID: <?= $row['id']; ?></h3>
            <p class="text-gray-600">Name: <?= $row['name']; ?></p>
            <p class="text-gray-600">Type: <?= $row['type']; ?></p>
            <p class="text-gray-600">Country ID: <?= $row['id_pays']; ?></p>
        </div>
    <?php } ?>
</div>

<!-- Continent Section -->
<h2 class="text-3xl font-bold text-center text-indigo-600 mt-12 mb-6">Continents</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php while ($row = mysqli_fetch_array($continent)) { ?>
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800">ID: <?= $row['id']; ?></h3>
            <p class="text-gray-600">Name: <?= $row['name']; ?></p>
        </div>
    <?php } ?>
</div>

</div>
<footer class="bg-[#6B3E26] text-white text-center py-4">
        <p>&copy; 2024 Explore Africa | All Rights Reserved</p>
    </footer>


<script src="script.js"></script>
</body>
</html>