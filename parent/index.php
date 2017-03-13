<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_SESSION['username']));
else
    header("location:../index.php");
include("../connect.php");
$parentUsername = $_SESSION['username'];
$findUsername = mysql_query("SELECT full_name FROM users WHERE username='$parentUsername'");
$username = mysql_fetch_array($findUsername);
$enable_access = mysql_query("SELECT enable_access FROM sitesettings WHERE sitesettings_id='1'");
$query_enable_access = mysql_fetch_array($enable_access);
$redirect = $query_enable_access['enable_access'];
if ($redirect != "yes"){
	header("location:../not-opened.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SPS Parent</title>
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

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
      <![endif]-->

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
<!--                    <li><a href="#user-guide">User Guide</a>-->
<!--                    </li>-->
                    <li><a href="../logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>
</div>

<div class="container">
    <div class="jumbotron">
       <h1>Welcome, <?php echo $username['full_name'] ?></h1>
   </div>
   <h1>This is the mark of your son.</h1>
   <p>In this system you will be able to know:</p>
   <ol>
    <li>Your son's score</li>
    <li>Your son's score <u>over time</u></li>
    <li>What the teacher's said about your son</li>
</ol>
<p>Click on your child's name below to continue</p>
<table class="table table-hover" align="center" cellpadding="0" cellspacing="0">
    <thead>
    <th>List of Child</th>
    </thead>
<?php
$findChildren = mysql_query("SELECT * FROM parentforstudent WHERE username='$parentUsername'") or die(mysql_error());
while($displayChildren = mysql_fetch_array($findChildren)){
    ?>
    <tr>
        <td><?php $childrenId = $displayChildren['studentID'];
        $findChildrenName = mysql_query("SELECT * FROM student WHERE StudentID='$childrenId'");
        $childrenName = mysql_fetch_array($findChildrenName); ?><a href="children-score.php?StudentID=<?php echo $childrenName['StudentID']; ?>"><?php echo $childrenName['StudentName']?></a></td>
    </tr>
<?php } ?>
</table>
</div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
