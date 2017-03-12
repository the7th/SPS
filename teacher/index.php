<?php
include("../session.php");
include("../connect.php");
$username = $_SESSION['username'];

$carinamauser = mysql_query("SELECT full_name FROM users WHERE username='$username'");
$namauser = mysql_fetch_array($carinamauser); // need to change to PDO
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SPS Teacher</title>
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

  <?php include("nav-teacher.php");?>

    <div class="container">
      <div class="row">
        <?php include '../nav-sidebar.php'?>
      <div class="col-md-10">
		<div class="jumbotron">
        <h2>Welcome <?php echo $namauser['full_name'] ?>.</h2>
        </div>
      <h4>Teacher, this is what you can do</h4>
      <p>In this system you can:</p>
      <ol>
      	<li>Key in marks of your students</li>
        <li>See your students marks by subject</li>
          <li>In the future, you will be able to mark your student's attendance here</li>
       </ol>
      <p>First, please choose a class.</p>
<table class="table table-striped table-hover">
<tr>
  <th>Class</th>
  <th>Class Info</th>
</tr>
<?php
$findClass = mysql_query("SELECT FormID, ClassName FROM form ORDER BY className") or die(mysql_error());
while($displayClass = mysql_fetch_array($findClass)){
	?>
	<tr>
		<td><a href="masuk-markah.php?formID=<?php echo $displayClass['FormID']; ?>"><?php echo $displayClass['ClassName']?></a></td>
    <td><a href="#">Click here</a></td>
	</tr>
<?php } ?>
</table>

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
