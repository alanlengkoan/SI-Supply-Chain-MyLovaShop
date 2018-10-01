<?php
// untuk koneksi
session_start();
include_once ('../db/koneksi.php');

 // proses tambah data
 if (isset($_POST['ubah'])) {
   $idsup  = $_POST['inpid'];
   $nma    = $_POST['inpnma'];
   $nmo    = $_POST['inpnmo'];
   $fax    = $_POST['inpfax'];
   $email  = $_POST['inpemail'];
   $web    = $_POST['inpweb'];
   $alamat = $_POST['inpalmt'];

   $query  = "UPDATE dta_supplier SET nama = '$nma', nomor = '$nmo', fax = '$fax', email = '$email', website = '$web', alamat = '$alamat'
              WHERE id_supplier = '$idsup'";
   $result = $mysqli->query($query);

   if ($result) {
     header('location:'.'supplier.php?&ubah');
   } else {
     echo "<script>
             window.alert('Tidak Dapat Mengubah Data !');
             window.location=(href='supplier.php')
           </script>";
   }

 }

 ?>
