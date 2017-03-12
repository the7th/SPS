<?php
include("../session.php");
include("../connect.php");
$formID = $_GET["formID"]; // dapatkan markah budak
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Teacher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
 
  </head>

<body>

<?php include("nav-teacher.php"); ?>

    <div class="container">
      <div class="row">
          <?php include ('../nav-sidebar.php'); ?>
      <div class="col-md-10">
      <h1>Please choose a student</h1>
      <p>Whichever you want to.</p>
      <table class="table table-striped">
      <tr>
      	<th>Student Names</th>
        <th>Edit Marks</th>
      </tr>
      <?php $findAllStudents = mysql_query("SELECT StudentID, StudentName FROM student WHERE formID='$formID'");
	  while($allStudents = mysql_fetch_array($findAllStudents)){
	  ?>
      	<tr>
        	<td><a href="masuk-markah-student.php?studentID=<?php echo $allStudents['StudentID']; ?>"><?php echo $allStudents['StudentName']?></a></td><td><a href="#">Edit Marks</a></td>
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
