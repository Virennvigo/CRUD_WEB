<?php 
include 'partial/main.php'; 
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];
    $query = "SELECT * FROM tb_transaksi WHERE id_transaksi='$id_transaksi'";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);    
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location.href = 'index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href = 'index.php';</script>";
    exit;
}
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Detail Data Transaksi</h2>
    <div class="card mx-auto" style="max-width: 500px;">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <h5 class="card-title text-center"><?= $data['jenis_transaksi']; ?></h5>
                <p class="list-group-item">ID_Transkasi: <?= $data['id_transaksi']; ?></p>
                <p class="list-group-item">Tanggal: <?= $data['tanggal']; ?></p>
                <p class="list-group-item">Keterangan: <?= $data['keterangan']; ?></p>
                <p class="list-group-item">Jumlah: <?= number_format($data['jumlah'], 0, ',', '.'); ?></p>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
<?php 
include 'partial/footer.php'; 
?>