<?php 

include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM tb_transaksi WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $sql);
    
    if ($koneksi->query($sql) === TRUE) {
        header("Location: transaksi.php");
        echo "<script>alert('Data berhasil dihapus'); 
        window.location.href = 'transaksi.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');
         window.location.href = 'transaksi.php';</script>";
    }
}
?>