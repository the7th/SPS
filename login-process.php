<?php
session_start();
// ob_start to start internal buffering
ob_start();
include("connect.php");
$username = $_POST["username"];
$password = $_POST["password"];

// protect dari mysql injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

//cari username ngan password
$findUserNPass = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");
$count = mysql_num_rows($findUserNPass);
$role = mysql_fetch_array($findUserNPass);
if($count==1){
	if($role['role']=="parent"){
		$_SESSION['username'] = $username;
		header("location:parent/");}
		if($role['role']=="teacher"){
			$_SESSION['username'] = $username;
			header("location:teacher/");}
			if($role['role']=="headmaster"){
				$_SESSION['username'] = $username;
				header("location:headmaster/");}
			}
			else{
				echo "Wrong username or password";
			}


