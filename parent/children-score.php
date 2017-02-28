<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_SESSION['username']));
else
  header("location:../login.php");
include("../connect.php");
$parentUsername = $_SESSION['username'];
$findUsername = mysql_query("SELECT * FROM users WHERE username='$parentUsername'");
$username = mysql_fetch_array($findUsername);
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<title>SPS Parent</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<script>
  function printpage()
  {
    window.print()
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
                        <li><a href="../logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </div>
    </div>
      
      <?php $studentID = $_GET["StudentID"];
      $findForm = mysql_query("SELECT FormID FROM student WHERE StudentID='$studentID' ");
      $findForm2 = mysql_fetch_array($findForm);
      $form = $findForm2['FormID'];

      $marks = mysql_query("SELECT * FROM marks WHERE StudentID='$studentID' AND FormID='$form'");

      $findForm3 = mysql_query("SELECT DISTINCT FormID FROM marks WHERE StudentID='$studentID'");
      $findForm4 = mysql_query("SELECT DISTINCT FormID FROM marks WHERE StudentID='$studentID'");

      $findChildrenName = mysql_query("SELECT FormID, StudentName FROM student WHERE StudentID='$studentID'");
      $childrenName = mysql_fetch_array($findChildrenName);

      $displayForm = $childrenName['FormID'];
      $displayForm2 = mysql_query("SELECT ClassName FROM form WHERE FormID='$displayForm'");
      $displayForm3 = mysql_fetch_array($displayForm2);

      ?>
      <div class="container">

       <p>Please look at your child mark below.</p>
       <p><strong>Child's name:</strong> <?php echo $childrenName['StudentName']; ?></p>
       <p><strong>Class:</strong> <?php echo $displayForm3['ClassName']?></p>
       <table class="table table-hover" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="info">
          <td><strong>SUBJECT</strong></td>
          <td><strong>MARK</strong></td>
          <td><strong>GRADE</strong></td>
          <td><strong>TEACHER'S COMMENTS</strong></td>
        </tr>
        <?php while($row = mysql_fetch_array($marks)){?>
        <tr>
          <td>
            <?php $subject = $row['subjekID'];
            $findSubject = mysql_query("SELECT * FROM subjek WHERE subjekID='$subject'");
            $arraySubject = mysql_fetch_array($findSubject);
            echo $arraySubject['subjekName']; ?></td>
            <td><?php echo $row['score']; ?></td>
            <td><?php echo $row['grade'];?></td>
            <td><?php echo $row['teacherComment'];?></td>
          </tr>
          <?php } ?>
        </table>
        <?php
        $seeDigitalSign = mysql_query("SELECT * FROM parentforstudent WHERE studentID='$studentID'");
        $digitalSign = mysql_fetch_array($seeDigitalSign);
        $digitalSign2 = $digitalSign['digitallysigned'];
        ?>
        <?php
        if ( $digitalSign2 == "signed" ) {
          ?>
          <p><strong>NOTE:</strong> You have digitally signed this report. However, you can view previous examination report for reference.</p>
          <?php }

          else { ?>

          <form action="digital-sign-process.php" method="post" name="form2" target="_blank">
            <input name="studentID" type="hidden" id="studentID" value="<?php echo $studentID ?>" />
            <p>
              <input name="digitallysigned2" type="checkbox" id="digitallysigned" value="signed">
              I have read my child's examination report

              <input type="submit" name="digitalsignsend" id="digitalsignsend" value="Submit">
              <label for="digitallysigned"></label>
            </p>
          </form>

          <?php } ?>
          <p align="center"><input type="button" value="Print this page" onclick="printpage()" class="btn btn-block btn-mini"></p>
          <p>To view previous exam scores, please select the class your child have entered before.</p>
          <div align="center">
            <form name="form1" method="post" action="compare-markah-anak.php">
              <input name="studentID" type="hidden" value="<?php echo $studentID ?>" />
              <p>Select form from:

                <label for="firstform"></label>
                <select name="firstform" id="firstform">
                  <?php while($row = mysql_fetch_array($findForm3)){
                    $form1 = $row['FormID'];
                    $formName = mysql_query("SELECT * FROM form WHERE FormID='$form1'");
                    $arrayForm1 = mysql_fetch_array($formName);
                    ?>
                    <option value="<?php echo $form1 ?>"><?php echo $arrayForm1['ClassName']; ?></option>
                    <?php } ?>
                  </select>

                  <label for="secondform"></label>
                  <select name="secondform" id="secondform">
                   <?php while($row2 = mysql_fetch_array($findForm4)){
                    $form2 = $row2['FormID']; $formName2 = mysql_query("SELECT * FROM form WHERE FormID='$form2'"); $arrayForm2 = mysql_fetch_array($formName2);
                    ?>
                    <option value="<?php echo $form2 ?>"><?php echo $arrayForm2['ClassName']; ?></option>
                    <?php } ?>    </select><p>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-small" value="Check result"></p>
                  </p>
                </form>
              </div>

            </div>

          </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.1.js"></script>
    

  </body>
  </html>
