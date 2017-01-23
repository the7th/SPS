<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test display markah</title>
<?php include("../connect.php");
$studentID = 1;
$form = 7;
$markah = mysql_query("SELECT * FROM marks WHERE studentID='$studentID' AND FormID='$form'");


?>
</head>

<body>
<br /><br />
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
</body>
</html>
