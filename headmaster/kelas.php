<?php
session_start();
if(isset($_SESSION['username']));
else
header("location:../login.php");
include("../connect.php");
$headmaster = $_SESSION['username'];
$findUsername = $pdo->query("SELECT * FROM users WHERE username='$headmaster'");
$username = $findUsername->fetch();
$FormID = $_GET["FormID"];
$findStudent = $pdo->query("SELECT StudentID, StudentName FROM student WHERE FormID='$FormID'");
$findForm = $pdo->query("SELECT * FROM form WHERE FormID='$FormID'");
$formName = $findForm->fetch();
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

<?php
include('../nav/nav.php')
?>

<div class="container-fluid">
        <div class="row">
        <?php include('../nav/nav-sidebar.php') ?>
            <div class="col-sm-10 col-md-10">
                <p>Senarai nama pelajar untuk kelas: <strong><?php echo $formName['ClassName']; ?></strong></p>
<ol>
<?php while($senaraipelajar = $findStudent->fetch()){ ?>
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
