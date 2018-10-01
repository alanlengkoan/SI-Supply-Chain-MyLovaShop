<!-- untuk bagian head -->
<?php include_once ('head.php') ?>

<!-- untk pemberian kode otomatis -->
<?php

$kdbar = $_GET['kd_barang'];
$sql   = "SELECT * FROM dta_barang WHERE kd_barang = '$kdbar'";
$query = $mysqli->query($sql);
while ($row = $query->fetch_array(MYSQLI_NUM)) {
  $nma      = $row[1];
  $jmlh     = $row[2];
  $hrga     = $row[3];
  $stuan    = $row[4];
  $kndsi    = $row[5];
  $stockaw  = $row[6];
  $stockter = $row[7];
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
               <h3>Ubah Barang</h3>
             </div>
           </div>

           <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Barang</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <!-- form tambah barang -->
                   <form class="form-horizontal form-label-left" action="dt_barang_proses_ubah.php" method="post">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpkode" value="<?php echo $_GET['kd_barang']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpnma" value=<?php echo "\"$nma\""; ?> required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpjmlh" value=<?php echo "\"$jmlh\""; ?> readonly required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Awal</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpstoaw" value=<?php echo "\"$stockaw\""; ?> readonly required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Terjual</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="inpstoter" value=<?php echo "\"$stockter\""; ?> readonly required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="number" name="inphrga" value=<?php echo "\"$hrga\""; ?> required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Satuan <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control" name="inpstuan" required>
                           <option><?php echo $stuan; ?></option>
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
                           <option><?php echo $kndsi; ?></option>
                           <option>- Kondisi Barang -</option>
                           <option>Ready Stock</option>
                           <option>Reject</option>
                           <option>Sold</option>
                           <option>Out Of Stock</option>
                         </select>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-warning" href="dt_barang.php">Batal</a>
                         <input class="btn btn-success" type="submit" name="ubah" value="Ubah">
                       </div>
                     </div>

                   </form>
                   <!-- akhir form tambah barang -->

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

   <!-- untuk bagian foot -->
   <?php include_once ('foot.php'); ?>
