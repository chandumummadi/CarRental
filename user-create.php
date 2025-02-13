<?php
session_start();
include('includes/config.php');

// Enable detailed error reporting during development
error_reporting(E_ALL);

$msg = "";
$error = "";

if (isset($_POST['submit'])) {
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Use bcrypt for hashing passwords
    $contactno = htmlspecialchars($_POST['contactno']);
    $dob = htmlspecialchars($_POST['dob']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $country = htmlspecialchars($_POST['country']);

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } else {
        // Insert data into the database
        try {
            $sql = "INSERT INTO tblusers (FullName, EmailId, Password, ContactNo, dob, Address, City, Country, RegDate) 
                    VALUES (:fullname, :email, :password, :contactno, :dob, :address, :city, :country, NOW())";
            $query = $dbh->prepare($sql);
            $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
            $query->bindParam(':dob', $dob, PDO::PARAM_STR);
            $query->bindParam(':address', $address, PDO::PARAM_STR);
            $query->bindParam(':city', $city, PDO::PARAM_STR);
            $query->bindParam(':country', $country, PDO::PARAM_STR);
            $query->execute();

            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                $msg = "User created successfully.";
            } else {
                $error = "Something went wrong. Please try again.";
            }
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE HTML>
<html lang="en">
<head>

<title> Premium Car Rentals</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png"> -->
<!-- <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png"> -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>

        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<div class="panel panel-default">
<center><div class="panel-heading "><h3>Create User<h3></div></center>
<?php if ($msg): ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($msg); ?></div>
<?php endif; ?>
<?php if ($error): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>


<center><form method="post">
    <label>Full Name</label><input type="text" name="fullname" required><br>
    <label>Email</label><input type="email" name="email" required><br>
    <label>Password</label><input type="password" name="password" required><br>
    <label>Contact No</label><input type="text" name="contactno" required><br>
    <label>Date of Birth</label><input type="date" name="dob"><br>
    <label>Address</label><textarea name="address"></textarea><br>
    <label>City</label><input type="text" name="city"><br>
    <label>Country</label><input type="text" name="country"><br>
    <button type="submit" name="submit">Create User</button>
</form></center>
                                

<<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>