<div class="container">

<div class="hero-unit">
    <h1>Selamat datang, <?php echo $username['name'] ?>.</h1>
    </div>

  <h1>Markah anak anda di sini.</h1>
  <p>Selamat datang dan selamat sejahtera.</p>
  <p>Di dalam sistem ini anda boleh:</p>
  <ol>
    <li>Mengetahui markah anak anda</li>
    <li>Melihat sejarah markah anak anda</li>
    <li>Melihat komen cikgu untuk anak anda</li>
    <li>Bersetuju bahawa anda telah melihat markah anak anda</li>
   </ol>
  <p>Pilih nama anak anda di bawah.</p>
<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">
<?php
$carianak = mysql_query("SELECT * FROM parentforstudent WHERE username='$parentUsername'") or die(mysql_error());
while($displayanak = mysql_fetch_array($carianak)){
?>
<tr>
<td><?php $id_anak = $displayanak['studentID']; $cari_nama_anak = mysql_query("SELECT * FROM student WHERE studentID='$id_anak'"); $nama_anak = mysql_fetch_array($cari_nama_anak); ?><a href="markah-anak.php?studentID=<?php echo $nama_anak['studentID']; ?>"><?php echo $nama_anak['StudentName']?></a></td>
</tr>
<?php } ?>
</table>

</div>
