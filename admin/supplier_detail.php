<!-- untuk bagian head -->
<?php include_once ('head.php') ?>

<?php
$idsup = $_GET['id_supplier'];
$sql   = "SELECT * FROM dta_supplier WHERE id_supplier = '$idsup'";
$query = $mysqli->query($sql);
$row   = $query->fetch_array(MYSQLI_ASSOC);

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
                <h3>Detail Supplier</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <!-- untuk bagian tabel dan awal row tabel -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Supplier</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- form form supplier -->
                    <form class="form-horizontal form-label-left" action="">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Supplier</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['id_supplier']; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Supplier</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['nama']; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Hp / Telepon</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['nomor']; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['fax']; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['email']; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['website']; ?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="inpalmt" rows="8" cols="25" readonly><?php echo $row['alamat']; ?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a class="btn btn-primary" href="supplier.php">Kembali</a>
                        </div>
                      </div>

                    </form>
                    <!-- akhir form supplier -->

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
