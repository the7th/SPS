<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//mysql_connect("localhost", "root", "root") or die(mysql_error());
//mysql_select_db("sa2") or die(mysql_error());

// mysql_connect("localhost", "root") or die(mysql_error());
// mysql_select_db("sa2") or die(mysql_error());

$host = 'localhost';
$db   = 'sa2';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);