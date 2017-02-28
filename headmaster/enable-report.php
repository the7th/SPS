<?php
session_start();
if(isset($_SESSION['username']));
else
    header("location:../login.php");
include("../connect.php");
$username = $_SESSION['username'];
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
    <link href="../css/bootstrap-responsive.css" rel="stylesheet"><title>Enable Report Access | Headmaster</title>
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">School Performance System</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="#user-guide">User Guide</a></li>
                    <li><a href="../logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-sm-2 col-md-2">
            <ul class="nav nav-tabs nav-stacked">
                <li><a href="index.php">Home | Class List</a>
                </li>
                <li><a href="school-statistics.php">School Statistics</a></li>
                <li><a href="enable-report.php">Enable Report Access</a></li>
            </ul>

        </div>
        <div class="col-sm-10 col-md-10">
            <div class="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> You should enable report access after you have done your meeting with your staff. Use with caution.
            </div>
            <h2>Do you want to enable report access?</h2>
            <form action="site-settings-process.php" method="post" name="enable" id="enable">
                <input name="enable_access" type="checkbox" id="enable_access" value="yes">
                <input type="submit" name="submit" id="submit" value="Yes. Enable report access" class="btn btn-large btn-warning">
            </form>
        </div></div></div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.11.1.js"></script>

</body>
</html>