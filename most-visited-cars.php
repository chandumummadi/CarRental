<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Most Visited Cars</title>
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
        <h1>Most Visited Cars</h1>
      </div>
    </div>
  </div>
</section>

<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
        $sql = "SELECT tblvehicles.*, tblbrands.BrandName FROM tblvehicles 
                JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand 
                ORDER BY tblvehicles.ViewCount DESC LIMIT 5";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
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
        } else {
            echo "<p>No most visited cars found.</p>";
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
