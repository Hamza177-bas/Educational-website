<?php 
            
            include 'conn.php';
            
          
            if (isset($_GET['id']) && isset($_GET['type'])) {
                $id = mysqli_real_escape_string($conn, $_GET['id']); 
                $type = mysqli_real_escape_string($conn, $_GET['type']);
            
                if ($type == 'vill') {
                   
                    $delete = mysqli_query($conn, "DELETE FROM `vill` WHERE `id` = '$id'");
                    if ($delete) {
                        echo " valid";
                    } else {
                        echo "novalid";
                    }
                } elseif ($type == 'pays') {
                    $delete_vill = mysqli_query($conn, "DELETE FROM `vill` WHERE `id_pays` = '$id'");

                    $delete = mysqli_query($conn, "DELETE FROM `pays` WHERE `id` = '$id'");
                    if ($delete) {
                        echo " valide";
                    } else {
                        echo " novalide";
                    }
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
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
                    <h2 class="text-3xl font-bold text-center text-green-600 mb-6">Pays (Countries)</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 ">
                        <?php while ($row = mysqli_fetch_array($pays)){ ?>
                            <div class="bg-orange-100 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                                <!-- Image for Country -->
                                <h3 class="text-2xl font-semibold text-black">ID: <?= $row['id']; ?></h3>
                                <p class="text-gray-700 text-lg">Name: <span class="font-bold text-green-700"><?= $row['name']; ?></span></p>
                                <p class="text-gray-600">Population: <?= $row['population']; ?></p>
                                <p class="text-gray-600">Languages: <?= $row['languages']; ?></p>
                                <p class="text-gray-600">Continent ID: <?= $row['id_continent']; ?></p>
                            <div class="line w-[8rem] mt-[5px]">
                                   <!-- Edit Button for Pays -->
<a href="editpays.php?id=<?= $row['id']; ?>&type=pays">
    <button class="text-white py-2 px-4 rounded hover:bg-[#ffff00a4] focus:outline-none focus:ring-2 focus:ring-[#ffff00]">
        <img src="/Educational-website/img_page/icons8-edit-24.png" alt="EDITE">
    </button>
</a>

                                    <!-- DELETE -->
                                    
                                    <a href="Admin.php?id=<?= $row['id']; ?>&type=pays">
                        <button class="text-white py-2 px-4 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                            <img src="/Educational-website/img_page/icons8-delete-50.png " class="w-[1.5rem]" alt="DELET">
                        </button>
                    </a>



                            </div>
                            </div>
                        <?php } ?>
                                    <a href="insertpays.php" class="ajoute m-[auto]">
                                                        Add Pays
                                    </a>
                            </div>
                    </div>
                    <div class="container mx-auto p-6">
                    <!-- Vill (Villages) Section -->
                    <h2 class="text-3xl font-bold text-center text-yellow-600 mt-12 mb-6">Villages</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php while ($row = mysqli_fetch_array($vill)) { ?>
        <div class="bg-green-100 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
            
            
            <h3 class="text-2xl font-semibold text-black">ID: <?= $row['id']; ?></h3>
            <p class="text-gray-700 text-lg">Name: <span class="font-bold text-yellow-700"><?= $row['name']; ?></span></p>
            <p class="text-gray-600">Type: <?= $row['type']; ?></p>
            <p class="text-gray-600">Country ID: <?= $row['id_pays']; ?></p>
            <div class="line w-[8rem] mt-[5px]">
               <!-- Edit Button for Villages -->
<a href="editvill.php?id=<?= $row['id']; ?>&type=vill">
    <button class="text-white py-2 px-4 rounded hover:bg-[#ffff00a4] focus:outline-none focus:ring-2 focus:ring-[#ffff00]">
        <img src="/Educational-website/img_page/icons8-edit-24.png" alt="تعديل">
    </button>
</a>

                
                <!-- Delete Button -->
                <a href="Admin.php?id=<?= $row['id']; ?>&type=vill">
    <button class="text-white py-2 px-4 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
        <img src="/Educational-website/img_page/icons8-delete-50.png " class="w-[1.5rem]" alt="حذف">
    </button>
</a>

        </div>
            
            
        </div>
    <?php } ?>
          <a href="insertvill.php" class="ajoute m-[auto]">
                        Add vill
    </a>
</div>

<!-- Continent Section -->
<h2 class="text-3xl font-bold text-center text-red-600 mt-12 mb-6">Continents</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <?php while ($row = mysqli_fetch_array($continent)) { ?>
        <div class="bg-yellow-100 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
            
            <h3 class="text-2xl font-semibold text-black">ID: <?= $row['id']; ?></h3>
            <p class="text-gray-700 text-lg">Name: <span class="font-bold text-red-700"><?= $row['name']; ?></span></p>
            <div class="line w-[8rem] mt-[5px]">

        </div>
        </div>
        
    <?php }?>
</div>
</div>
<footer class="bg-[#6B3E26] text-white text-center py-4">
        <p>&copy; 2024 Explore Africa | All Rights Reserved</p>
    </footer>
<script src="script.js"></script>
</body>
</html>