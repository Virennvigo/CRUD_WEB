<?php

include '../koneksi.php';
if (isset($_GET['userId'])) {
    $userId = (int)$_GET['userId'];

    $query = "SELECT * FROM tb_login WHERE user_id = $userId";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode(['Error' => 'Data Tidak Ditemukan']);
    }
} else {
    echo json_encode(['Error' => 'ID Pengguna tidak diberikan']);
}
?>