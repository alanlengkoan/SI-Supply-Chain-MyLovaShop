<?php
// untuk koneksi
include_once ('../db/koneksi.php');

ob_start();

// untuk menampilkan data dari tabel
$idtran = $_GET['id_transaksi'];
$query  = "SELECT * FROM dta_trnsaksi_brng_keluar WHERE id_transaksi = '$idtran'";
$result = $mysqli->query($query);

$no = 1;
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

?>

<!-- koding CSS -->
<style media="screen">

.judul {
  padding: 4mm;
}

.admin {
  font-weight: bold;
}

.nama {
  text-decoration: underline;
}

</style>

<!-- koding HTML dan PHP query -->
<page>
  <div class="judul">
    <h2>Bukti Transaksi</h2>
    <p>PT. Maju Mundur by Alan Saputra Lengkoan</p>
    <p><em>Indonesia, Sulawesi Selatan, Gowa</em> </p>
    <hr>
    <table>
      <tr>
        <td>ID Transaksi</td>
        <td>: <?php echo $row['id_transaksi']; ?></td>
      </tr>
      <tr>
        <td>Waktu</td>
        <td>: <?php echo $row['waktu']; ?></td>
      </tr>
      <tr>
        <td>Supplier</td>
        <td>: <?php echo $row['nmasup']; ?></td>
      </tr>
      <tr>
        <td>ID Supplier</td>
        <td>: <?php echo $row['id_supplier']; ?></td>
      </tr>
    </table>
  </div>

  <!-- tabel barang masuk -->
  <table border="1" align="center">
    <tr align="center">
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Jumlah Barang</th>
      <th>Harga Barang</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
     <tr>
       <td><?php echo $row['kd_barang']; ?></td>
       <td><?php echo $row['nmabar']; ?></td>
       <td align="center"><?php echo $row['jumlah']; ?></td>
       <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
       <td><?php echo "Rp. ". number_format($row['total'], 0, ",", ".");; ?></td>
       <td><?php echo $row['status']; ?></td>
     </tr>
     <?php } ?>
  </table>

  <p>Yang bertanda tangan dibawah ini :</p>
  <p class="admin">Administrator</p>
  <br>
  <br>
  <br>
  <p class="nama">Alan Saputra Lengkoan</p>

</page>

<?php
// proses untuk menampilkan file pdf
$content = ob_get_clean();
include_once('../html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'en', 'utf-8');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Bukti Pembayaran.pdf');

 ?>
