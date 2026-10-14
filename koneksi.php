<?php
$host = 'localhost';
$dbname = 'kuliko';
$username = 'root';
$password = '';

$koneksi = mysqli_connect($host, $username, $password, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>