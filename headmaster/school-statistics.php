<?php 
session_start();
if(isset($_SESSION['username']));
else 
header("location:../login.php");
include("../connect.php");
$headmaster = $_SESSION['username'];
$findUsername = mysql_query("SELECT * FROM users WHERE username='$headmaster'");
$username = mysql_fetch_array($findUsername);

$findClassList = mysql_query("SELECT * FROM form ORDER BY ClassName ASC");
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
<!--    <link href="../css/bootstrap-responsive.css" rel="stylesheet">-->
    <title>School Statistics | Headmaster</title>
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
                    <li><a href="teacher-profile.php">Teacher Profile</a></li>
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
                    <li>
                        <a href="index.php">Home | Class List</a>
                    </li>
                    <li><a href="school-statistics.php">School Statistics</a></li>
                    <li><a href="enable-report.php">Enable Report Access</a></li>
                </ul>

            </div>
            <div class="col-sm-10 col-md-10">
      <p>Average for school student for this current examination result is:</p>
<?php
$avg = mysql_query("SELECT AVG(Score) FROM marks");
$avgResult = mysql_fetch_array($avg); ?>
<h1 align="center"><?php echo $avgResult['AVG(Score)'];?>%</h1>
<p>Number of students who got each grade.</p>
<table class="table table-condensed table-bordered">
<tr>
<th>Grade</th>
<th>Number of students</th>
</tr>
<?php
$avgGrade = mysql_query("SELECT Grade, COUNT(Grade) FROM marks GROUP BY Grade");
while ($avgGradeResult = mysql_fetch_array($avgGrade)){ ?>
<tr>
<td><?php
echo $avgGradeResult['Grade']?></td><td><?php echo $avgGradeResult['COUNT(Grade)']; ?></td>
</tr>
<?php
}
?>
</table>
<p>Number of teacher registered in the system</p>
<h3><?php 
$search_teacher_registered = mysql_query("SELECT role, COUNT(role) FROM users WHERE role='teacher'");
$teacher_registered = mysql_fetch_array($search_teacher_registered);
echo $teacher_registered['COUNT(role)'];
?></h3>
<p>Number of parents registered in the system</p>
<h3><?php 
$search_parent_registered = mysql_query("SELECT role, COUNT(role) FROM users WHERE role='parent'");
$parent_registered = mysql_fetch_array($search_parent_registered);
echo $parent_registered['COUNT(role)'];
?></h3>
</div></div></div>
</body>
</html>