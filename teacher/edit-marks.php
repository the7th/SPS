<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SPS - Edit Marks</title>
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
      content_css: "css/content.css",
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

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">School Performance System</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#user-guide">User Guide</a></li>
              <li><a href="#logout">Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div><div class="container">
<?php
include '../connect.php';
$studentID = intval($_GET['studentID']);
$SubjectID = $_GET['SubjectID'];
$getstudentinfo = mysql_query("SELECT * FROM student WHERE studentID='$studentID'");
$studentinfo = mysql_fetch_array($getstudentinfo) or die(mysql_error());
$form = $studentinfo['FormID'];
$getforminfo = mysql_query("SELECT * FROM form WHERE FormID='$form'");
$forminfo = mysql_fetch_array($getforminfo) or die(mysql_error());

$infomarkah = mysql_query("SELECT * FROM marks WHERE studentID='$studentID' AND subjekID='$SubjectID' AND FormID='$form'");
$markah = mysql_fetch_array($infomarkah);
?>

<div class="alert alert-info"><strong>Instruction: </strong>There are two forms that are enabled. The first one is subject name. The second one is the score. Please enter the right subject and you can enter your score below. You can key in the mark below.</p>
</div>
<form action="process-new-marks.php" method="post" name="form1" class="form-horizontal" id="form1">

<input name="studentID" type="hidden" id="studentID" value="<?php echo $studentID ?>" />
  <div class="control-group">
    <label class="control-label" for="StudentName">Student Name</label>
    <div class="controls"><input name="StudentName" type="text" id="StudentName" value="<?php echo $studentinfo['StudentName'] ?>" readonly /></div></div>

    <label class="control-label" for="SubjectID">Subject Name</label>
    <div class="control-group">
    <div class="controls">
    <select name="SubjectID" id="SubjectID">
    <?php

    $query2 = 'SELECT * FROM subjek';
$result2 = mysql_query($query2) or die(mysql_error());
while ($row2 = mysql_fetch_array($result2)) {
    echo '<option value='.$row2['subjekID'].'>'.$row2['subjekName'].'</option>';
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
    <div class="controls"><input name="FormID" type="text" id="FormID" value="<?php echo $forminfo['ClassName'] ?>" readonly />
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
</body>
</html>