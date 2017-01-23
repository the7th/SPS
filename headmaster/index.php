<?php
session_start();
if(isset($_SESSION['username']));
else
    header("location:../login.php");
include("../connect.php");
$headmaster = $_SESSION['username'];
$findUsername = mysql_query("SELECT * FROM users WHERE username='$headmaster'");
$username = mysql_fetch_array($findUsername);

$findClassList = mysql_query("SELECT * FROM form ORDER BY ClassName ASC");
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
<div class="navbar navbar-inverse navbar-fixed-top navbar-default">
    <div class="navbar-header"><a class="navbar-brand" href="#">School Performance System</a>
        <button
                type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="glyphicon glyphicon-bar"></span>
            <span class="glyphicon glyphicon-bar"></span>
            <span
                    class="glyphicon glyphicon-bar"></span>
        </button>
    </div>
    <div class="container">
        <div class="container">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a>
                    </li>
                    <li><a href="#user-guide">User Guide</a>
                    </li>
                    <li><a href="../logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-2">
            <ul class="nav nav-tabs nav-stacked">
                <li class="active">
                    <a href="index.php">Home | Class List</a>
                </li>
                <li><a href="school-statistics.php">School Statistics</a></li>
                <li><a href="enable-report.php">Enable Report Access</a></li>
            </ul>

        </div>
        <div class="col-sm-10 col-md-10">
            <p>Below is a list of class available in SMK Danau Kota</p>
            <ul>
                <?php while($classList = mysql_fetch_array($findClassList)){ ?>
                    <li><a href="kelas.php?FormID=<?php echo $classList['FormID']; ?>"><?php echo $classList['ClassName'];?></a></li>
                <?php } ?>
            </ul>
        </div></div></div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.11.1.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
