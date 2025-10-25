<?php

include '../koneksi.php';
if ($_POST) {
    $userId = $_POST['userId'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "UPDATE tb_login SET username = '$username', password = '$password' WHERE user_id='$userId'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data berhasil diubah";
    } else {
        echo "Data gagal diubah" . mysqli_error($koneksi);
    }
}
?>