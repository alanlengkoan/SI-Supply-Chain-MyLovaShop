<?php
// untuk awal
session_start();

function kodeacak()
{
  $karakter = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  $pass     = array();
  $karakterLenght = strlen($karakter) - 1;
  for ($i = 0; $i < 7; $i++) {
    $n      = rand(0, $karakterLenght);
    $pass[] = $karakter[$n];
  }
  return implode($pass);
}

$kode = kodeacak();
$_SESSION["kode"] = $kode;

$im = imagecreatetruecolor(100, 50);
$bg = imagecolorallocate($im, 50, 86, 165); // untuk bagian warna
$fg = imagecolorallocate($im, 255, 255, 255);
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 20, 15, $kode, $fg); // untuk bagian size

header("cache-control: no-cache, must-revalidate");
header("content-type: image/png");
imagepng($im);
imagedestroy($im);

 ?>
