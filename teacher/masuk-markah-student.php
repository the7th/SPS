<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SPS - Add New Marks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<script>
function validateForm()
{
var x=document.forms["form1"]["Score"].value;
if (x==null || x=="")
  {
  alert("You have to enter the score before clicking submit");
  return false;
  }
}
</script>
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
<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	width:500,
	    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]


 });
</script>

  </head>

  <body>

<?php include("nav-teacher.php"); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-2">
<?php include ('nav-sidebar-teacher.php'); ?>
        </div>
      <div class="col-md-10">
<?php
include("../connect.php");
$studentID = intval($_GET["studentID"]);
// di sini data daripada satu table ke table lain
$getStudentInfo = mysql_query("SELECT StudentID,StudentName,FormID FROM student WHERE studentID='$studentID'");
$studentInfo = mysql_fetch_array($getStudentInfo) or die(mysql_error());
$form = $studentInfo['FormID'];
$getFormInfo = mysql_query("SELECT FormID,ClassName FROM form WHERE FormID='$form'");
$formInfo = mysql_fetch_array($getFormInfo) or die(mysql_error());
?>

<div class="alert alert-info"><strong>Instruction: </strong>There are two forms that are enabled. The first one is subject name. The second one is the score. Please enter the right subject and you can enter your score below. You can key in the mark below.</p>
</div>
<form action="process-new-marks.php" onsubmit="return validateForm()"  method="post" name="form1" class="form-horizontal" id="form1">

<input name="studentID" type="hidden" id="studentID" value="<?php echo $studentID ?>" />
  <div class="control-group">
    <label class="control-label" for="studentName">Student Name</label>
    <div class="controls"><input name="studentName" type="text" id="studentName" value="<?php echo $studentInfo['StudentName'] ?>" readonly /></div>
  </div>

    <label class="control-label" for="SubjectID">Subject Name</label>
    <div class="control-group">
    <div class="controls">
    <select name="SubjectID" id="SubjectID">
    <?php

	$query2 = "SELECT subjekID,subjekName FROM subjek";
$result2 = mysql_query($query2) or die(mysql_error());
while($row2 = mysql_fetch_array($result2)){
      echo "<option value=" .$row2['subjekID'].">" . $row2['subjekName']. "</option>" ;
}
	?>
    </select>
</div>
</div>
 <div class="control-group">
    <label class="control-label" for="Score">Score</label>
  <div class="controls">
   <input type="text" name="Score" id="Score" />
</div>
</div>
<div class="control-group">
    <label class="control-label" for="FormID">Form</label>
    <div class="controls"><input name="FormID" type="text" id="FormID" value="<?php echo $formInfo['ClassName'] ?>" readonly />
</div>
</div>
<div class="control-group">

    <label class="control-label" for="teacherComment">Teacher's comment</label>
    <div class="controls"><textarea name="teacherComment" id="teacherComment"></textarea></div></div>
<div class="controls">
    <input name="Submit" type="submit" class="btn btn-primary" id="Submit" value="Submit Mark" />
</div>
</form>
  </div>
</div>
</div>
</div>
<!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.11.1.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
