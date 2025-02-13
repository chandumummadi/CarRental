<?php
session_start();
include('includes/config.php');
error_reporting(0);

$results = [];
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM tblusers WHERE 
            FullName LIKE :keyword OR 
            EmailId LIKE :keyword OR 
            ContactNo LIKE :keyword";
    $query = $dbh->prepare($sql);
    $query->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Users</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>



<div class="container mt-5">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h3>Search Users</h3>
        </div>
        <div class="panel-body">
            <form method="post" class="form-inline mb-3">
                <div class="form-group mx-sm-3">
                    <input 
                        type="text" 
                        class="form-control" 
                        name="keyword" 
                        placeholder="Search by name, email, or phone" 
                        value="<?php echo isset($_POST['keyword']) ? htmlentities($_POST['keyword']) : ''; ?>" 
                        required>
                </div>
                <button type="submit" name="search" class="btn btn-primary">Search</button>
            </form>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Reg Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($results) > 0) {
                        $cnt = 1;
                        foreach ($results as $user) {
                            echo "<tr>
                                    <td>" . $cnt++ . "</td>
                                    <td>" . htmlentities($user->FullName) . "</td>
                                    <td>" . htmlentities($user->EmailId) . "</td>
                                    <td>" . htmlentities($user->ContactNo) . "</td>
                                    <td>" . htmlentities($user->Address) . "</td>
                                    <td>" . htmlentities($user->City) . "</td>
                                    <td>" . htmlentities($user->Country) . "</td>
                                    <td>" . htmlentities($user->RegDate) . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include('includes/footer.php'); ?>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
