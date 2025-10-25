<?php

$server = "localhost";
$username = "root";
$pass = "";
$database = "db_data_transaksi";
$koneksi = mysqli_connect($server, $username, $pass, $database);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}   
?>