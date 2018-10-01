<?php
// untuk koneksi
session_start();
include_once ('../db/koneksi.php');
if ($_SESSION['inpuser'] == "") {
  echo "<script>
          window.alert('Anda Harus Masuk Dahulu !');
          window.location=(href='../halaman/index.php')
        </script>";
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SI Logistik Pergudangan</title>

    <!-- Pemanggilan Bootstrap -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">

    <!-- Pemanggilan Icon dan Gambar -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">

    <!-- Pemanggilan DataTables -->
    <link rel="stylesheet" href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css">

    <!-- Tema CSS -->
    <link rel="stylesheet" href="../css/custom.min.css">

  </head>
