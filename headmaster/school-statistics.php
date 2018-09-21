<?php 
session_start();
if (isset($_SESSION['username']));
else {
    header('location:../login.php');
}
include '../connect.php';
$headmaster = $_SESSION['username'];
$findUsername = $pdo->query("SELECT * FROM users WHERE username='$headmaster'");
$username = $findUsername->fetch();

$findClassList = $pdo->query('SELECT * FROM form ORDER BY ClassName ASC');
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

<?php include '../nav/nav.php'?>

        <div class="container-fluid">
        <div class="row-fluid">

            <?php include '../nav/nav-sidebar.php'?>
            <div class="col-sm-10 col-md-10">
      <p>Average for school student for this current examination result is:</p>
<?php
$avg = $pdo->query('SELECT AVG(Score) FROM marks');
$avgResult = $avg->fetch(); ?>
<h1 align="center"><?php echo $avgResult['AVG(Score)']; ?>%</h1>
<p>Number of students who got each grade.</p>
<table class="table table-condensed table-bordered">
<tr>
<th>Grade</th>
<th>Number of students</th>
</tr>
<?php
$avgGrade = $pdo->query('SELECT Grade, COUNT(Grade) FROM marks GROUP BY Grade');
while ($avgGradeResult = $avgGrade->fetch()) {
    ?>
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
$search_teacher_registered = $pdo->query("SELECT role, COUNT(role) FROM users WHERE role='teacher'");
$teacher_registered = $search_teacher_registered->fetch();
echo $teacher_registered['COUNT(role)'];
?></h3>
<p>Number of parents registered in the system</p>
<h3><?php 
$search_parent_registered = $pdo->query("SELECT role, COUNT(role) FROM users WHERE role='parent'");
$parent_registered = $search_parent_registered->fetch();
echo $parent_registered['COUNT(role)'];
?></h3>
</div></div></div>
</body>
</html>