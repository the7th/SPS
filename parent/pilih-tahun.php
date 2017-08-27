<!DOCTYPE html>
<html>
<head>
    <title>Awesomeness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">

    <?php include("../connect.php");

	//After this have to put WHERE studentID so that we can specify specific student

    $studentID = $_GET["studentID"];
	$cariform = $pdo->query("SELECT DISTINCT FormID FROM marks WHERE studentID='$studentID'");
	$cariform2 = $pdo->query("SELECT DISTINCT FormID FROM marks WHERE studentID='$studentID'");


	?>
    
  </head>
  <body>
    <script src="../js/bootstrap.min.js"></script>
<div class="container">
	<div class="hero-unit">

      <h1>Selamat datang Encik Abu</h1>
	  <p>Lihat markah anak anda di bawah</p>
    </div>
  <form name="form1" method="post" action="">
    <p>Select form from:

      <label for="firstform"></label>
      <select name="firstform" id="firstform">
      <?php while($row = mysql_fetch_array($cariform)){ 
	  	  $form1 = $row['FormID']; $namaform = mysql_query("SELECT * FROM form WHERE FormID='$form1'"); $arrayform1 = mysql_fetch_array($namaform); 
?>
        <option value="<?php echo $form1 ?>"><?php echo $arrayform1['ClassName']; ?></option>
        <?php } ?>
      </select>

    <label for="form2"></label>
    <select name="form2" id="form2">
 <?php while($row2 = mysql_fetch_array($cariform2)){ 
	  	  $form2 = $row2['FormID']; $namaform2 = mysql_query("SELECT * FROM form WHERE FormID='$form2'"); $arrayform2 = mysql_fetch_array($namaform2); 
?>
        <option><?php echo $arrayform2['ClassName']; ?></option>
        <?php } ?>    </select>
    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-large" value="Check result">
    </p>
  </form>
  <p>
  
 </p>
</div>
</body>
</html>