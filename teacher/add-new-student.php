<?php include("../session.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Add New Student</title>
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

<?php include("nav-teacher.php"); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-2">
<?php include ('nav-sidebar-teacher.php'); ?>
        </div>
      <div class="col-md-10">
<h2 align="center">Add New Student</h2>
<?php include("../connect.php") ?>
<p>Here you can add new student</p>
<p>To add new student, just fill in the form below and click Add New Student</p>
<form role="form" id="form1" name="form1" method="post" action="process-new-student.php">
  <div class="form-group">
    <label for="studentName">Student Name</label>
    <input type="text" name="studentName" id="studentName" class="form-control" />
  </div>

    <div class="form-group">
        <label for="parent_name">Parent Name</label>
        <input type="text" name="parent_name" id="parent_name" class="form-control" />
    </div>

  <div class="form-group">
    <label for="IC">IC</label>
    <input type="text" name="IC" id="IC" class="form-control" />
  </div>

  <div class="form-group">
    <label for="FormID">Form</label>
    <select name="FormID" id="FormID" class="form-control" >
    <?php

$result = mysql_query("SELECT FormID, ClassName FROM form") or die(mysql_error());
while($row = mysql_fetch_array($result)){
      echo "<option value=" .$row['FormID'].">" . $row['ClassName']. "</option>" ;
}
	?>
    </select>
  </div>
  <p>
    <input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Add New Student" />
  </p>
</form>
</div>
</div>
</div>
</body>
</html>
