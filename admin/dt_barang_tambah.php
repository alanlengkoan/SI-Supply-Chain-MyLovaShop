<!-- untuk bagian head -->
<?php include_once ('head.php') ?>

<!-- untk pemberian kode otomatis -->
<?php

$sql    = "SELECT kd_barang FROM dta_barang";
$carkod = $mysqli->query($sql);
$datkod = $carkod->fetch_array(MYSQLI_ASSOC);
$jumdat = $carkod->num_rows;

if ($datkod) {
  $nilkod  = substr($jumdat[0], 1);
  $kode    = (int) $nilkod;
  $kode    = $jumdat + 1;
  $kodeoto = "KDR-".str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
  $kodeoto = "KDR-0001";
}
 ?>

 <body class="nav-md">

   <!-- awal container -->
   <div class="container body">
     <div class="main_container">

       <!-- menu samping -->
       <?php include_once ('header.php'); ?>

       <!-- awal isi halaman -->
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>Tambah Barang</h3>
             </div>
           </div>

           <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Form Barang</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <!-- form tambah barang -->
                   <form class="form-horizontal form-label-left" action="dt_barang_tambah.php" method="post">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpkode" value="<?php echo $kodeoto; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpnma" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpjmlh" value="0" readonly required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="number" name="inphrga" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Satuan <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control" name="inpstuan" required>
                           <option>- Satuan -</option>
                           <option>Unit</option>
                           <option>Buah</option>
                           <option>Dus</option>
                           <option>Sak</option>
                           <option>Set</option>
                         </select>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Kondisi Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control" name="inpkndsibrng" required>
                           <option>- Kondisi Barang -</option>
                           <option>Ready Stock</option>
                           <option>Reject</option>
                           <option>Sold</option>
                           <option>Out Of Stock</option>
                         </select>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Awal</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpstoaw" value="0" readonly required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Terjual</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpstoter" value="0" readonly required>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-warning" href="dt_barang.php">Batal</a>
                         <input class="btn btn-success" type="submit" name="tambah" value="Tambah">
                       </div>
                     </div>

                   </form>
                   <!-- akhir form tambah barang -->

                   <div class="ln_solid"></div>
                   <div class="row">
                     <div class="col-md-6">
                       <p>
                         <b>Keterangan :</b>
                         <ol>
                           <li><b>Quantity</b> adalah banyaknya benda satuan kemasan yang lebih kecil. </li>
                           <li><b>Ready Stock</b> adalah Barang Tersedia. </li>
                           <li><b>Reject</b> adalah Barang tidak dalam kodisi baik, ada cacat. </li>
                           <li><b>Sold</b> adalah Barang Habis Terjual. </li>
                           <li><b>Out Of Stock</b> adalah Brang yang habis persediannya di tangan Penjual atau Supplier </li>
                         </ol>
                       </p>
                     </div>
                   </div>

                 </div>
               </div>
             </div>
           </div>
           <!-- akhir row form -->

         </div>
       </div>
       <!-- akhir isi halaman -->

       <!-- footer -->
       <?php include_once ('footer.php'); ?>

     </div>
   </div>
   <!-- akhir container -->

<!-- koding php -->
<?php
// untuk proses input
if (isset($_POST['tambah'])) {
  $kdbar  = $_POST['inpkode'];
  $nma    = $_POST['inpnma'];
  $jmlh   = $_POST['inpjmlh'];
  $hrga   = $_POST['inphrga'];
  $stuan  = $_POST['inpstuan'];
  $kndsi  = $_POST['inpkndsibrng'];
  $stoaw  = $_POST['inpstoaw'];
  $stoter = $_POST['inpstoter'];

  $sql     = "SELECT * FROM dta_barang WHERE kd_barang = '$kdbar'";
  $q_kdbar = $mysqli->query($sql);

  if ($row = $q_kdbar->fetch_row()) {
    echo "<script>
            window.alert('Barang Dengan Kode = ".$kdbar." Sudah Ada !');
            window.location=(href='brng_masuk.php')
          </script>";
  } else {
    $query  = "INSERT INTO dta_barang (kd_barang, nama, jumlah, harga, satuan, kondisi, stock_awal, stock_terjual)
               VALUES ('$kdbar', '$nma', '$jmlh', '$hrga', '$stuan', '$kndsi', '$stoaw', '$stoter')";
    $result = $mysqli->query($query);

    echo "<script>
            window.location=(href='dt_barang.php?&simpan')
          </script>";
  }

}

 ?>

 <!-- untuk bagian foot -->
 <?php include_once ('foot.php'); ?>
