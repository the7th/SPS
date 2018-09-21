
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Compare Markah Anak</title>
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
    <?php include '../connect.php';
$studentID = $_POST['studentID'];
$findForm = mysql_query("SELECT * FROM student WHERE studentID='$studentID' ");
$findForm2 = mysql_fetch_array($findForm);
$form = $findForm2['FormID'];
$firstForm = $_POST['firstform'];
$secondForm = $_POST['secondform'];
$mark = mysql_query("SELECT * FROM marks WHERE studentID='$studentID' AND FormID='$firstForm'");
$mark2 = mysql_query("SELECT * FROM marks WHERE studentID='$studentID' AND FormID='$secondForm'");

    //lepas ni kena letak WHERE studentID supaya boleh specify mana student

?>
<div class="container">
	<div class="hero-unit">
    <p>Compare marks</p>
    </div>
	  <p>Please look at your child mark below.</p>
    	<table class="table table-hover" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="info">
    <td><strong>SUBJECT</strong></td>
    <td><strong>MARK</strong></td>
    <td><strong>CLASS</strong></td>
    <td><strong>GRADE</strong></td>
    <td><strong>TEACHER'S COMMENTS</strong></td>

  </tr>
  <?php while ($row2 = mysql_fetch_array($mark2)) {
    ?>
  <tr>
    <td><?php $subjek = $row2['subjekID'];
    $carisubjek = mysql_query("SELECT * FROM subjek WHERE subjekID='$subjek'");
    $arraysubjek = mysql_fetch_array($carisubjek);
    echo $arraysubjek['subjekName']; ?></td>
    <td><?php echo $row2['Score']; ?></td>
    <td><?php $kelas = $row2['FormID'];
    $carikelas = mysql_query("SELECT * FROM form WHERE FormID='$kelas'");
    $arraykelas = mysql_fetch_array($carikelas);
    echo $arraykelas['ClassName']; ?></td>
    <td><?php echo $row2['Grade']; ?></td>
    <td><?php echo $row2['teacherComment']; ?></td>

  </tr>

  <?php
} ?>
</table>

    	<table class="table table-hover" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="info">
    <td><strong>SUBJECT</strong></td>
    <td><strong>MARK</strong></td>
    <td><strong>CLASS</strong></td>
    <td><strong>GRADE</strong></td>
    <td><strong>TEACHER'S COMMENTS</strong></td>

  </tr>
  <?php while ($row = mysql_fetch_array($mark)) {
        ?>
  <tr>
    <td><?php $subjek = $row['subjekID'];
        $carisubjek = mysql_query("SELECT * FROM subjek WHERE subjekID='$subjek'");
        $arraysubjek = mysql_fetch_array($carisubjek);
        echo $arraysubjek['subjekName']; ?></td>
    <td><?php echo $row['Score']; ?></td>
    <td><?php $kelas = $row['FormID'];
        $carikelas = mysql_query("SELECT * FROM form WHERE FormID='$kelas'");
        $arraykelas = mysql_fetch_array($carikelas);
        echo $arraykelas['ClassName']; ?></td>
    <td><?php echo $row['Grade']; ?></td>
    <td><?php echo $row['teacherComment']; ?></td>

  </tr>

  <?php
    } ?>
</table>

</div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.11.1.js"></script>
    

</body>
</html>
