<?php

include '../koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'");

$cek = mysqli_num_rows($query);
if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';

    header("location:../home.php");
} else {
     echo"<script>alert('Username atau password salah!'); window.location.href ='../login.php';</script>";
}
?>