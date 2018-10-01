<!-- untuk bagian head -->
<?php include_once ('head.php') ?>

<!-- untk pemberian kode otomatis -->
<?php
$sql    = "SELECT id_supplier FROM dta_supplier";
$carkod = $mysqli->query($sql);
$datkod = $carkod->fetch_array(MYSQLI_ASSOC);
$jumdat = $carkod->num_rows;

if ($datkod) {
  $nilkod  = substr($jumdat[0], 1);
  $kode    = (int) $nilkod;
  $kode    = $jumdat + 1;
  $kodeoto = "IDSUP-".str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
  $kodeoto = "IDSUP-0001";
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
               <h3>Tambah Supplier</h3>
             </div>
           </div>

           <div class="clearfix"></div>

           <!-- untuk bagian tabel dan awal row tabel -->
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Form Supplier</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                   <!-- form tambah barang -->
                   <form class="form-horizontal form-label-left" action="supplier_tmbh.php" method="post">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Supplier</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="inpid" value="<?php echo $kodeoto; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Supplier <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true"><i class="fa fa-user"></i> </span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inpnma" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Hp / Telepon <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true"><i class="fa fa-phone"></i> </span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inpnmo" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true"><i class="fa fa-fax"></i> </span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inpfax" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true"><i class="fa fa-envelope"></i> </span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inpemail" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Website <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true"><i class="fa fa-link"></i> </span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inpweb" required>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea class="form-control col-md-7 col-xs-12" name="inpalmt" rows="8" cols="25"></textarea>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-warning" href="supplier.php">Batal</a>
                         <input class="btn btn-success" type="submit" name="tambah" value="Tambah">
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

<!-- koding php -->
<?php
 // proses tambah data
 if (isset($_POST['tambah'])) {
   $idsup  = $_POST['inpid'];
   $nma    = $_POST['inpnma'];
   $nmo    = $_POST['inpnmo'];
   $fax    = $_POST['inpfax'];
   $email  = $_POST['inpemail'];
   $web    = $_POST['inpweb'];
   $alamat = $_POST['inpalmt'];

   $sql     = "SELECT * FROM dta_supplier WHERE id_supplier = '$idsup'";
   $q_idsup = $mysqli->query($sql);

   if ($row = $q_idsup->fetch_row()) {
     echo "<script>
             window.alert('Data Supplier Dengan ID = ".$idsup." Sudah Ada !');
             window.location=(href='supplier_tmbh.php')
           </script>";
   } else {
     $query  = "INSERT INTO dta_supplier (id_supplier, nama, nomor, fax, email, website, alamat)
                VALUES ('$idsup', '$nma', '$nmo', '$fax', '$email', '$web', '$alamat')";
     $result = $mysqli->query($query);

     echo "<script>
             window.location=(href='supplier.php?&simpan')
           </script>";
   }
 }
 ?>

 <!-- untuk bagian foot -->
 <?php include_once ('foot.php'); ?>
