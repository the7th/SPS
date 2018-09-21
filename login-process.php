<?php

session_start();
ob_start();
include 'connect.php';
$username = $_POST['username'];
$password = $_POST['password'];

//cari username ngan password
$findUserNPass = $pdo->query("SELECT username, role, password FROM users WHERE username='$username' AND password='$password'");
$count = $findUserNPass->rowCount();
$role = $findUserNPass->fetch();
if ($count == 1) {
    $_SESSION['role'] = $role['role'];

    if ($role['role'] == 'teacher') {
        $_SESSION['username'] = $username;
        header('location:teacher/');
    }

    if ($role['role'] == 'parent') {
        $_SESSION['username'] = $username;
        header('location:parent/');
    }
    if ($role['role'] == 'headmaster') {
        $_SESSION['username'] = $username;
        header('location:headmaster/');
    }
} else {
    echo 'Wrong username or password';
}
