<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title> Premium Car Rentals</title>
<!-- Styles and Fonts -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>

<!-- Include Header -->
<?php include('includes/header.php'); ?>

<!-- Fetch and Display Remote Data -->
<section class="remote-users">
  <h2>Users from External Source</h2>
  <?php
    // Define the remote URL
    $url_name = "http://manasapannala.ml/user";

    // Initialize cURL session
    $ch_session = curl_init();

    // Set cURL options
    curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch_session, CURLOPT_URL, $url_name);

    // Execute cURL request
    $result_url = curl_exec($ch_session);

    // Check for errors and display the result
    if(curl_errno($ch_session)) {
        echo "<p>Error: " . curl_error($ch_session) . "</p>";
    } elseif ($result_url === false) {
        echo "<p>Failed to fetch data from the remote URL.</p>";
    } else {
        // Sanitize and display the result
        echo "<pre>" . htmlspecialchars($result_url, ENT_QUOTES, 'UTF-8') . "</pre>";
    }

    // Close cURL session
    curl_close($ch_session);
  ?>
</section>

<!-- Include Modular Components -->
<section class="additional-users">
  <?php include('includes/shoppeusers.php'); ?>
  <?php include('includes/algousers.php'); ?>
</section>

</body>
</html>
