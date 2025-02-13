<?php
header('Content-Type: application/json');
include('config.php');

// Connect to the database and fetch the data
$sql = "SELECT * FROM tblusers";
$query = $dbh->prepare($sql);
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// Return the data as JSON
echo json_encode($users);
?>
