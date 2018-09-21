<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Processing New Student...</title>

</head>
<body>

<?php
include '../connect.php';

    $studentName = $_POST['studentName'];
    $IC = $_POST['IC'];
    $FormID = $_POST['FormID'];

    mysql_query("INSERT INTO student(studentName, IC, FormID) VALUES('$studentName','$IC','$FormID') ") or die(mysql_error());
    echo 'Name inserted is '.$studentName.' with IC of '.$IC.'<br>';

?>
<a href="add-new-student.php">click here to return back.</a>
</body>
</html>