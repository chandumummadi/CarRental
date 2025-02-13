<!DOCTYPE html>
<html lang="en"> <!-- Add lang attribute -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Car Rentals</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
</head>
<body>
<header>
    <div class="default-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="newlogo">
                        <a href="index.php"><img src="assets/images/logo.png" alt="Car Rentals Logo"></a>
                    </div>
                </div>
                <div class="col-sm-9 col-md-10">
                    <div class="header_info">
                        <?php
                        $email = "support@example.com";
                        $contactno = "123-456-7890";
                        $sql = "SELECT EmailId, ContactNo FROM tblcontactusinfo";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) {
                                $email = $result->EmailId;
                                $contactno = $result->ContactNo;
                            }
                        }
                        ?>
                        <div class="header_widgets">
                            <div class="circle_icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <p class="uppercase_text">For Support Mail us:</p>
                            <a href="mailto:<?= htmlentities($email); ?>"><?= htmlentities($email); ?></a>
                        </div>
                        <div class="header_widgets">
                            <div class="circle_icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <p class="uppercase_text">Service Helpline Call Us:</p>
                            <a href="tel:<?= htmlentities($contactno); ?>"><?= htmlentities($contactno); ?></a>
                        </div>
                        <?php if (isset($_SESSION['login'])) { ?>
                                <li><a href="#"><i class="fa fa-user"></i> Welcome, <?php echo htmlentities($_SESSION['fname']); ?></a></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                            <?php } else { ?>
                                <li><a href="#loginform" data-toggle="modal"><i class="fa fa-sign-in"></i> Login</a></li>
                                <li><a href="#signupform" data-toggle="modal"><i class="fa fa-user-plus"></i> Signup</a></li>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navigation -->
    <nav id="navigation_bar" class="navbar navbar-dark bg-primary">
        <div class="container">
            <div class="navbar-header">
                <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="header_wrap">
                <div class="user_login">
                    <ul>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <?php
                                if (isset($_SESSION['login'])) {
                                    $email = $_SESSION['login'];
                                    $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {
                                            echo htmlentities($result->FullName);
                                        }
                                    }
                                }
                                ?>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if (isset($_SESSION['login'])): ?>
                                    <li><a href="profile.php">Profile Settings</a></li>
                                    <li><a href="update-password.php">Update Password</a></li>
                                    <li><a href="my-booking.php">My Booking</a></li>
                                    <li><a href="post-testimonial.php">Post a Testimonial</a></li>
                                    <li><a href="my-testimonials.php">My Testimonial</a></li>
                                    <li><a href="logout.php">Sign Out</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="page.php?type=aboutus">About Us</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="page.php?type=faqs">NEWS</a></li>
                        <li><a href="users.php">Users</a></li>
                        <li><a href="contact-us.php">Contact Us</a></li>
                        <li><a href="list_all_users.php">Other Users</a></li>
                        <li><a href="admin/index.php">Admin</a></li>
                        <li><a href="user-create.php">Add New User</a></li>
                        <li><a href="user-search.php">Search Users</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
