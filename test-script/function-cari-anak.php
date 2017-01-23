<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Try Cari Anak</title>
</head>

<body>
<p>Di bawah ialah function kalau anak ada ramai. Kalau satu pun sama gak hehe. kena buat login system dan append value dalam parentUsername dalam session tuk login tu</p>
<table>
<?php
$parentUsername = "asamad";
include("connect.php");
$findChildren = mysql_query("SELECT * FROM parentForStudent WHERE parentUsername='$parentUsername'") or die(mysql_error());
while($displayChildren = mysql_fetch_array($findChildren)){
	?>
	<tr>
		<td><?php $childrenId = $displayChildren['studentID']; $findChildrenName = mysql_query("SELECT * FROM student WHERE studentID='$childrenId'"); $childrenName = mysql_fetch_array($findChildrenName); echo $childrenName['StudentName'] ?></td>
	</tr>
<?php } ?>
</table>

</body>
</html>