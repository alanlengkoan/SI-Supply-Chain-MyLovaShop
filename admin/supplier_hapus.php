<?php
// untuk koneksi
session_start();
include_once ('../db/koneksi.php');

$idsup = $_GET['id_supplier'];
$sql   = "DELETE FROM dta_supplier WHERE id_supplier = '$idsup'";
$query = $mysqli->query($sql);

if ($query) {
  header('location:'.'supplier.php?&hapus');
}

 ?>
