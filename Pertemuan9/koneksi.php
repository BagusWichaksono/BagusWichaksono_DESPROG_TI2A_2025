<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "prakwebdb";

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>