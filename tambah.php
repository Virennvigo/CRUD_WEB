<?php 
include 'partial/header.php';
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];
    $jenis_transaksi = $_POST['jenis_transaksi'];
    
    $query = "INSERT INTO tb_transaksi (id_transaksi, tanggal, keterangan, jumlah, jenis_transaksi) 
    VALUES ('$id_transaksi', '$tanggal', '$keterangan', '$jumlah', '$jenis_transaksi')"; 
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }
} 
?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Tambah Data Transaksi Keuangan</h1> 
            <form action="" method="post" id="myform">
                <div class="row py-3">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">ID Transaksi</label>
                            <input type="text" name="id_transaksi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Transaksi</label>
                            <select name="jenis_transaksi" class="form-control">
                                <option value="Uang masuk">uang masuk</option>
                                <option value="Uang keluar">uang keluar</option>
                            </select>
                        </div>
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