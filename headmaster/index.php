<?php
session_start();
if (isset($_SESSION['username']));
else {
    header('location:../login.php');
}
include '../connect.php';
$headmaster = $_SESSION['username'];
$findUsername = $pdo->query("SELECT * FROM users WHERE username='$headmaster'");
$username = $findUsername->fetch();

$findClassList = $pdo->query('SELECT * FROM form ORDER BY ClassName ASC');
?>
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
        }
    </style>

    <title>SPS Headmaster</title>
</head>

<body>

<?php
include '../nav.php'?>

<div class="container-fluid">
    <div class="row">
        <?php include '../nav-sidebar.php' ?>
        <div class="col-sm-10 col-md-10">
            <p>Below is a list of class available in SMK Danau Kota</p>
            <ul>
                <?php while ($classList = mysql_fetch_array($findClassList)) {
    ?>
                    <li><a href="kelas.php?FormID=<?php echo $classList['FormID']; ?>"><?php echo $classList['ClassName']; ?></a></li>
                <?php
} ?>
            </ul>
        </div>
    </div>
</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.11.1.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
