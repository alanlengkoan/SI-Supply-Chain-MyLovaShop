<?php

// Koneksi
$host = "localhost";
$user = "my_root";
$pass = "my_pass";
$dbnm = "si_sc_mylovashop";

$mysqli = new mysqli($host, $user, $pass, $dbnm);
if ($mysqli->connect_errno) {

  echo "Gagal Konek !". $mysqli->connect_errno;

} else {

  // echo "Berhasil Konek !";

}

 ?>
