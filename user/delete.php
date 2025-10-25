<?php

include '../koneksi.php';
if($_POST) {
    $userId = $_POST['userId'];

    $query = "DELETE FROM tb_login WHERE user_id='$userId'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data berhasil dihapus";
    } else {
        echo "Gagal menghapus data" . mysqli_error($koneksi);
    }
} else {
    echo "Tidak ada data yang dikirim";
}

?>