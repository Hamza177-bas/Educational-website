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
        <h2 class="text-2xl font-semibold mb-6 text-center">Add Country Information</h2>
        <form action="insertpays.php" method="POST" class="space-y-4">
            <div>
                <input type="text" name="name" placeholder="Name" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <input type="number" name="population" placeholder="Population" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <input type="text" name="languages" placeholder="Languages" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="text-center">
                <input type="submit" name="submit" value="Submit" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </form>
    </div>

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
        $id_con = 1;  // Assuming the continent ID is always 1

        $stmt = $conn->prepare("INSERT INTO pays (name, population, languages, id_continent) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sisi", $name, $population, $languages, $id_con);  // 'sisi' means string, integer, string, integer

        if ($stmt->execute()) {
            echo "<div class='text-green-500 text-center mt-4'>New record inserted successfully!</div>";
        } else {
            echo "<div class='text-red-500 text-center mt-4'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
    </div>
    <footer class="bg-[#6B3E26] text-white text-center py-4">
        <p>&copy; 2024 Explore Africa | All Rights Reserved</p>
    </footer>
</body>
</html>
