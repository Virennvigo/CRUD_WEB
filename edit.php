<?php 
include 'partial/header.php';
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];

    $query = "SELECT * FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];
    $jenis_transaksi = $_POST['jenis_transaksi'];

    $update = "UPDATE tb_transaksi SET tanggal = '$tanggal', keterangan = '$keterangan', jumlah = '$jumlah', jenis_transaksi = '$jenis_transaksi'
    WHERE id_transaksi = '$id_transaksi'";

    if (mysqli_query($koneksi, $update)) {
        echo "<script>alert('Data berhasil diubah'); 
        window.location.href = 'transaksi.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah');</script>";
    }
}
?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Ubah Data Transaksi</h1> 
            <form action="" method="post" id="myform">
                <div class="row py-3">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>ID Transaksi</label>
                            <input type="text" name="id_transaksi" class="form-control" value="<?= $data['id_transaksi']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" value="<?= number_format($data['jumlah'], 0, ',', '.'); ?>" required>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="">Jenis Transaksi</label>
                        <select name="jenis_transaksi" id="jenis_transaksi" class="form-control">
                             <option value="uang masuk"
                             <?= ($data['jenis_transaksi'] == 'uang masuk') ? 'selected' : ''; ?>>uang masuk</option>
                             <option value="Uang Keluar" 
                             <?= ($data['jenis_transaksi'] == 'uang keluar') ? 'selected' : ''; ?>>uang keluar</option>
                         </select>
                        </div>
                        </div>
                <footer>
                    <button class="btn btn-info btn-sm" type="submit">Simpan</button>
                    <a href="transaksi.php" class="btn btn-danger btn-sm">Cancel</a>
                </footer>
            </form>
        </div>
    </div>
</div>
<?php include 'partial/footer.php'; ?>