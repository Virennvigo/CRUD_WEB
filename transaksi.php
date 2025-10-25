<?php include 'partial/header.php'; ?>
<div class="container-fluid mt-5">
   <div class="row">
        <div class="col-lg-12">
            <header class="py-2">
                <h1 class="text-center">Data Transaksi</h1>
                <div class="text-end">
                    <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
                    <a href="report.php" class="btn btn-success btn-sm" target="_blank">report data </a>
                </div>
            </header>    
            <table id="table_transaksi" class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID_Transaksi</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Jenis Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $query ="SELECT * FROM tb_transaksi";
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;
                    $total_masuk = 0;
                    $total_keluar = 0;
                    while ($data = mysqli_fetch_array($result)) {
                        // Hitungan total uang masuk dan uang keluar
                        if (strtolower($data['jenis_transaksi']) == 'uang masuk') {
                            $total_masuk += $data['jumlah'];
                        } else if (strtolower($data['jenis_transaksi']) == 'uang keluar') {
                            $total_keluar += $data['jumlah'];
                        }
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $data['id_transaksi'] . "</td>";
                        echo "<td>" . $data['tanggal'] . "</td>";
                        echo "<td>" . $data['keterangan'] . "</td>";
                        echo "<td class='text-end'>" . number_format($data['jumlah'],0,',','.') . "</td>";
                        echo "<td>" . $data['jenis_transaksi'] . "</td>";
                        echo "<td>
                          <a class='btn btn-warning btn-sm' href='edit.php?id=" .
                         $data['id_transaksi'] . "'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?id=" .
                        $data['id_transaksi'] . "' onclick='return confirm(\"apakah data produk ini akan dihapus?\")'>Delete</a>
                        </td>";
                        echo "</tr>"; 
                    }
                    ?>
                </tbody>
            </table>
            <!-- Rekap Total -->
            <div class="row mt-4">
                <div class="col-md-6 offset-md-3">
                    <table class="table table-bordered">
                            <tr>
                                <th>Total Uang Masuk</th>
                                <td class="text-end text-success fw-bold"><?php 
                                echo number_format($total_masuk,0,',','.'); ?></td>
                            </tr>
                            <tr>
                                <th>Total Uang Keluar</th>
                                <td class="text-end text-danger fw-bold"><?php 
                                echo number_format($total_keluar,0,',','.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>         
</div>
<script>
    $(document).ready(function() {
        $('#table_transaksi').DataTable();
    })
</script>
<?php include 'partial/footer.php'; ?>