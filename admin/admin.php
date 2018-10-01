<!-- index admin -->
<?php include_once ('head.php') ?>

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
              <h3>Dashboard</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <h3>Sistem Informasi Logistik Pergudangan Berbasis Website</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="">
                <div class="x_content">
                  <div class="row">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="fa fa-cubes"></i>
                        </div>
                        <?php
                        $sql    = "SELECT * FROM dta_barang";
                        $carkod = $mysqli->query($sql);
                        $jumdat = $carkod->num_rows;
                         ?>
                        <div class="count"><?php echo $jumdat; ?></div>
                        <h3><a href="dt_barang.php">Barang</a> </h3>
                      </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="fa fa-building-o"></i>
                        </div>
                        <?php
                        $sql    = "SELECT * FROM dta_supplier";
                        $carkod = $mysqli->query($sql);
                        $jumdat = $carkod->num_rows;
                         ?>
                        <div class="count"><?php echo $jumdat; ?></div>
                        <h3><a href="supplier.php">Supplier</a> </h3>
                      </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="fa fa-sign-out"></i>
                        </div>
                        <?php
                        $sql    = "SELECT * FROM dta_trnsaksi_brng_masuk";
                        $carkod = $mysqli->query($sql);
                        $jumdat = $carkod->num_rows;
                         ?>
                        <div class="count"><?php echo $jumdat; ?></div>
                        <h3><a href="dt_barangmasuk.php">Barang Masuk</a> </h3>
                      </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon">
                          <i class="fa fa-sign-out"></i>
                        </div>
                        <?php
                        $sql    = "SELECT * FROM dta_trnsaksi_brng_keluar";
                        $carkod = $mysqli->query($sql);
                        $jumdat = $carkod->num_rows;
                         ?>
                        <div class="count"><?php echo $jumdat; ?></div>
                        <h3><a href="dt_barangkeluar.php">Barang Keluar</a> </h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- akhir isi halaman -->

      <!-- footer -->
      <?php include_once ('footer.php'); ?>

    </div>
  </div>
  <!-- akhir container -->

<?php include_once ('foot.php'); ?>
