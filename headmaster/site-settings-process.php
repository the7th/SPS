<?php
session_start();
if(isset($_SESSION['username']));
else
  header("location:../login.php");
include("../connect.php");
$username = $_SESSION['username'];
$enable_access = $_POST["enable_access"];
mysql_query("UPDATE sitesettings SET enable_access='$enable_access' WHERE sitesettings_id='1'") or die(mysql_error());
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
  <link href="../css/bootstrap-responsive.css" rel="stylesheet"><title>SPS Headmaster</title>
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
            <h1>Report Access have been enabled</h1>
        </div></div></div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.1.js"></script>
    
  </body>
  </html>
