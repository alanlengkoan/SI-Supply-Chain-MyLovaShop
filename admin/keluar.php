<?php
// untuk proses keluar
session_start();
session_unset();
session_destroy();
header("location: ../halaman/index.php");

 ?>
