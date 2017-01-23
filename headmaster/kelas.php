<?php
session_start();
if(isset($_SESSION['username']));
else
header("location:../login.php");
include("../connect.php");
$headmaster = $_SESSION['username'];
$findUsername = mysql_query("SELECT * FROM users WHERE username='$headmaster'");
$username = mysql_fetch_array($findUsername);
$FormID = $_GET["FormID"];
$findStudent = mysql_query("SELECT StudentID, StudentName FROM student WHERE FormID='$FormID'");
$findForm = mysql_query("SELECT * FROM form WHERE FormID='$FormID'");
$formName = mysql_fetch_array($findForm);
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
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
<title>Kelas | SPS Headmaster</title>
<script>
function goBack()
  {
  window.history.back()
  }
</script>
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
                <p>Senarai nama pelajar untuk kelas: <strong><?php echo $formName['ClassName']; ?></strong></p>
<ol>
<?php while($senaraipelajar = mysql_fetch_array($findStudent)){ ?>
<li><a href="pelajar.php?studentID=<?php echo $senaraipelajar['StudentID']; ?>&amp;FormID=<?php echo $FormID?>"><?php echo $senaraipelajar['StudentName'];?></a></li>
<?php } ?>
</ol>
 <input class="btn" type="button" value="Back" onclick="goBack()">

   </div> </div></div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.1.js"></script>
    
</body>
</html>
