<?php
define('HOST', 'localhost');
define('USER', 'postgres');
define('PASS', 'bagus12345');
define('DB1', 'prakwebdb');

$db1 = new PDO("pgsql:host=" . HOST . ";dbname=" . DB1, USER, PASS);
$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>