<?php

require_once('vendor/autoload.php');

$pdf = new TCPDF();
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('PT. Dylana Beads');
$pdf->setTitle('Laporan Data Keuangan');
$pdf->setHeaderData('', 0, 'Laporan Data Keuangan');

$pdf->setMargins(15, 27, 15);
$pdf->setHeaderMargin(10);
$pdf->setFooterMargin(10);

$pdf->AddPage();

include 'koneksi.php';

$sql = "SELECT * from tb_transaksi";
$result = mysqli_query($koneksi, $sql);

$html = '<h3>Laporan Data</h3>';
$html .= '<table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID_Transaksi</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Jenis Transaksi</th>
                </tr>
            </thead>
            <tbody>';
$no = 1;
while ($row = mysqli_fetch_assoc($result)) {
    // Format jumlah ke bentuk rupiah, contoh: Rp 10.000
    $jumlah_rupiah = number_format($row['jumlah'], 0, ',', '.');
    $html .= '<tr>
                <td>' . $no++ . '</td>
                <td>' . ($row['id_transaksi']) . '</td>
                <td>' . ($row['tanggal']) . '</td>
                <td>' . ($row['keterangan']) . '</td>
                <td>' . $jumlah_rupiah . '</td>
                <td>' . ($row['jenis_transaksi']) . '</td>
                </tr>';
}
$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('Laporan Data Produk.pdf', 'I'); // I = untuk menampilkan preview PDF

?>