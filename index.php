<?php 
include 'partial/main.php'; 
include 'koneksi.php';
$query = "SELECT * FROM tb_transaksi";
$result = mysqli_query($koneksi, $query);
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Data Transaksi</h2>
    <div class="row">
        <?php while ($data = mysqli_fetch_array($result)) : ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['jenis_transaksi']; ?></h5>
                    <p class="card-text">Jumlah Nominal: <?= number_format($data['jumlah'], 0, ',', '.'); ?></p>
                    <a href="detail.php?id=<?= $data['id_transaksi']; ?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php
include 'partial/footer.php';
?>