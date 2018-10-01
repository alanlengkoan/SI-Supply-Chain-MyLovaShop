<?php
// untuk koneksi
include_once ('../db/koneksi.php');

// untuk proses input
if (isset($_POST['ubah'])) {
  $kdbar  = $_POST['inpkode'];
  $nma    = $_POST['inpnma'];
  $jmlh   = $_POST['inpjmlh'];
  $hrga   = $_POST['inphrga'];
  $stuan  = $_POST['inpstuan'];
  $kndsi  = $_POST['inpkndsibrng'];
  $stoaw  = $_POST['inpstoaw'];
  $stoter = $_POST['inpstoter'];

  $query  = "UPDATE dta_barang SET nama = '$nma', jumlah = '$jmlh', harga = '$hrga',
             satuan = '$stuan', kondisi = '$kndsi', stock_awal = '$stoaw', stock_terjual = '$stockter' WHERE kd_barang = '$kdbar'";
  $result = $mysqli->query($query);

  if ($result) {

    header('location:'.'dt_barang.php?&ubah');

  } else {
    echo "<script>
            window.alert('Tidak Dapat Mengubah Data !');
            window.location=(href='dt_barang.php')
          </script>";
  }

}

 ?>
