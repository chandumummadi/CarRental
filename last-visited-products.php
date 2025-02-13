<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Last Visited Products</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php include('includes/header.php'); ?>

<section class="page-header">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Last Five Previously Visited Products</h1>
      </div>
    </div>
  </div>
</section>

<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
        if (isset($_COOKIE['recent_products'])) {
            $recentProducts = json_decode($_COOKIE['recent_products'], true);
            foreach ($recentProducts as $productId) {
                $sql = "SELECT tblvehicles.*, tblbrands.BrandName FROM tblvehicles 
                        JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand 
                        WHERE tblvehicles.id = :id";
                $query = $dbh->prepare($sql);
                $query->bindParam(':id', $productId, PDO::PARAM_INT);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_OBJ);

                if ($result) { ?>
                    <div class="product-listing-m gray-bg">
                      <div class="product-listing-img">
                        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="Image" />
                      </div>
                      <div class="product-listing-content">
                        <h5><?php echo htmlentities($result->BrandName); ?>, <?php echo htmlentities($result->VehiclesTitle); ?></h5>
                        <p class="list-price">$<?php echo htmlentities($result->PricePerDay); ?> Per Day</p>
                      </div>
                    </div>
                <?php }
            }
        } else {
            echo "<p>No recently visited products.</p>";
        }
        ?>
      </div>
    </div>
  </div>
</section>

<?php include('includes/footer.php'); ?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
