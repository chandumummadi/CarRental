<?php




$host = "localhost"; // MySQL host
$port = "3306"; // MySQL default port
$dbname = "carrental"; // Your local database name
$username = "root"; // MAMP's default MySQL username
$password = "root"; // MAMP's default MySQL password


// $host = 'sql309.infinityfree.com' // Hostname remains localhost
// $username = 'if0_37891889' // Default username for MAMP
// $password = 'riHBiM5ghW' // Default password for MAMP
// $dbname = 'if0_37891889_carrental' // The name of your local database

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>