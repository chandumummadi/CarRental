<?php 
// DB credentials.
define('DB_HOST', 'localhost'); // Hostname remains localhost
define('DB_USER', 'root'); // Default username for MAMP
define('DB_PASS', 'root'); // Default password for MAMP
define('DB_NAME', 'carrental'); // The name of your local database



// define('DB_HOST', 'sql309.infinityfree.com'); // Hostname remains localhost
// define('DB_USER', 'if0_37891889'); // Default username for MAMP
// define('DB_PASS', 'riHBiM5ghW'); // Default password for MAMP
// define('DB_NAME', 'if0_37891889_carrental'); // The name of your local database

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>