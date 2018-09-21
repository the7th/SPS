<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SPS - Processing New Marks...</title>
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

<?php include '../nav/nav.php'; ?>

<div class="container">
<?php
include '../connect.php';
$studentID = intval($_POST['studentID']);
$StudentName = $_POST['studentName'];
$SubjectID = $_POST['SubjectID'];
$FormName = $_POST['FormID'];
$Score = $_POST['Score'];
$teacherComment = $_POST['teacherComment'];
$searchFormID = mysql_query("SELECT * FROM form WHERE ClassName='$FormName'");
$arrayFormID = mysql_fetch_array($searchFormID);
$form = $arrayFormID['FormID'];
mysql_query("INSERT INTO marks (studentID, subjekID, Score, FormID, teacherComment) VALUES('$studentID', '$SubjectID', '$Score', '$form', '$teacherComment' ) ")
or die(mysql_error());
?>

<div class="alert alert-success"><p><strong>Information inserted.</strong> Below is the data that have been inserted into the system.</p></div>
<p>Please check the information below. If it's incorrect, please <a href="edit-marks.php?studentID=<?php echo $studentID ?>&SubjectID=<?php echo $SubjectID?>&FormID=<?php echo $form?>">click here</a> to edit it.</p>
<p>Student Name: <?php echo $StudentName ?></p>
<p>Subjek ID: <?php echo $SubjectID ?></p>
<p>Markah: <?php echo $Score ?></p>
<p>Form Name: <?php echo $FormName ?></p>
<p>Teacher's comment: <?php echo $teacherComment ?></p>
</div>
</body>
</html>