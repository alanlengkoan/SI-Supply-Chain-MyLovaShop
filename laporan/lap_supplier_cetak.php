<?php
// untuk koneksi
include_once ('../db/koneksi.php');

ob_start();
?>

<!-- koding CSS -->
<style media="screen">

.judul {
  padding: 4mm;
  text-align: center;
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
    <h2>Laporan Data Supplier</h2>
    <p>PT. Maju Mundur by Alan Saputra Lengkoan</p>
    <p><em>Indonesia, Sulawesi Selatan, Gowa</em> </p>
    <hr>
  </div>

  <!-- tabel barang masuk -->
  <table border="1" align="center">
    <tr align="center">
      <th>No</th>
      <th>ID Supplier</th>
      <th>Nama Supplier</th>
      <th>No. Hp / Telepon</th>
      <th>Fax</th>
      <th>Email</th>
      <th>Website</th>
      <th>Alamat</th>
    </tr>
    <?php
    // untuk menampilkan data dari tabel
    $query  = "SELECT * FROM dta_supplier";
    $result = $mysqli->query($query);

    $no = 1;
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
     ?>
     <tr>
       <td><?php echo $no ?></td>
       <td><?php echo $row['id_supplier']; ?></td>
       <td><?php echo $row['nama']; ?></td>
       <td><?php echo $row['nomor']; ?></td>
       <td><?php echo $row['fax']; ?></td>
       <td><?php echo $row['email']; ?></td>
       <td><?php echo $row['website']; ?></td>
       <td><?php echo $row['alamat']; ?></td>
     </tr>
     <?php
       $no++;
      }
      ?>
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
$html2pdf->Output('Laporan Supplier.pdf');

 ?>
