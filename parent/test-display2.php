<!DOCTYPE html>
<html>
<head>
    <title>Awesomeness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <script src="../js/bootstrap.min.js"></script>
    <?php include("../connect.php");
$studentID = 1;
$form = 7;
$markah = mysql_query("SELECT * FROM marks WHERE studentID='$studentID' AND FormID='$form'");


?>
<div class="container">
	<div class="hero-unit">
      <h1>Selamat datang Encik Abu</h1>
	  <p>Lihat markah anak anda di bawah</p>
    </div>
    <p>Ini untuk tengok markah anak yang dah dipilih anak mana satu</p>
    	<table width="600" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>Subjek</td>
    <td>Markah</td>
    <td>Kelas / Tingkatan</td>
  </tr>
  <?php while($row = mysql_fetch_array($markah)){?>
  <tr>
    <td><?php $subjek = $row['subjekID']; $carisubjek = mysql_query("SELECT * FROM subjek WHERE subjekID='$subjek'"); $arraysubjek = mysql_fetch_array($carisubjek); echo $arraysubjek['subjekName']; ?></td>
    <td><?php echo $row['Score']; ?></td>
    <td><?php $kelas = $row['FormID']; $carikelas = mysql_query("SELECT * FROM form WHERE FormID='$kelas'"); $arraykelas = mysql_fetch_array($carikelas); echo $arraykelas['ClassName'];?></td>
  </tr>
  <?php } ?>
</table>
</div>
</body>
</html>