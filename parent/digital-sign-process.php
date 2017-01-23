<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_SESSION['username']));
else
header("location:../login.php");
include("../connect.php");
$parentUsername = $_SESSION['username'];
$findUsername = mysql_query("SELECT full_name FROM users WHERE username='$parentUsername'");
$username = mysql_fetch_array($findUsername);
$digitallySigned = $_POST["digitallysigned2"];
$studentID = $_POST["studentID"];
mysql_query("UPDATE parentforstudent SET digitallysigned='$digitallySigned' WHERE studentID='$studentID'") or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Digital Sign process</title>
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

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

  <div class="navbar navbar-inverse navbar-fixed-top navbar-default">
      <div class="navbar-header"><a class="navbar-brand" href="#">School Performance System</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="glyphicon glyphicon-bar"></span>
              <span class="glyphicon glyphicon-bar"></span>
              <span class="glyphicon glyphicon-bar"></span>
          </button>
      </div>
      <div class="container">
          <div class="container">
              <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                      <li class="active"><a href="#">Home</a>
                      </li>
                      <li><a href="#user-guide">User Guide</a>
                      </li>
                      <li><a href="index.php">Log In</a>
                      </li>
                  </ul>
              </div>
              <!--/.navbar-collapse -->
          </div>
      </div>
  </div>

<div class="container">
<h1>Digital sign complete, <?php echo $username['full_name'];?>.</h1>
	  <p>You have digitally signed the document and this will be the proof that you have read your child's examination report.</p>

</div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.1.js"></script>
    

</body>
</html>
