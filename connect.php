<?php
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost", "root", "root") or die(mysql_error());
mysql_select_db("sa2") or die(mysql_error());

// mysql_connect("localhost", "root") or die(mysql_error());
// mysql_select_db("sa2") or die(mysql_error());
