<?php
session_start();
if(isset($_SESSION['username']));
else
header("location:../login.php");
include("../connect.php");
$headmaster = $_SESSION['username'];
$findUsername = $pdo->query("SELECT * FROM users WHERE username='$headmaster'");
$username = $findUsername->fetch();
$studentID = $_GET["studentID"];
$FormID = $_GET["FormID"];

$findStudentDetail = $pdo->query("SELECT * FROM marks WHERE studentID='$studentID' AND FormID='$FormID'");
$findStudentName = $pdo->query("SELECT * FROM student WHERE studentID='$studentID'");
$studentName = $findStudentName->fetch();
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
<title>Markah Prestasi Pelajar</title>
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
            <p><strong>Nama Pelajar:</strong> <?php echo $studentName['StudentName'] ?></p>
            <table class="table table-striped" width="600">
                <tbody><tr>
                    <th>Subjek</th>
                    <th>Score</th>
                    <th>Grade</th>
                    <th>Komen</th>
                </tr>
                <?php
                    while($studentDetail = $findStudentDetail->fetch()) { ?>
                <tr>
                    <td><?php echo $studentDetail['subjekID']; ?></td>
                    <td><?php echo $studentDetail['Score']; ?></td>
                    <td><?php echo $studentDetail['Grade']; ?></td>
                    <td><?php echo $studentDetail['teacherComment']; ?></td>
                </tr>
                <?php	}
                ?>
                </tbody></table>
            <input class="btn form-control btn-default" type="button" value="Back" onclick="goBack()">
        </div></div></div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.1.js"></script>
    
</body>
</html>
