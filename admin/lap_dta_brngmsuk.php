<!-- untuk bagian head -->
<?php include_once ('head.php'); ?>

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
              <h3>Laporan Transaksi Barang Masuk</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <!-- awal cetak semua -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <a href="../laporan/lap_dta_cetak_brngmsuk.php" target="_blank">
                <button class="btn btn-success" type="submit" name="cetak">Cetak Semua</button>
              </a>
            </div>
          </div>
          <!-- akhir cetak semua -->

          <div class="clearfix"></div>

          <!-- awal cetak berdasarkan tanggal -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="x_panel">
                <form class="" action="../laporan/lap_dta_cetak_brngmsuk.php" method="post" target="_blank">
                  <div class="control-group">
                    <div class="controls">
                      <label class="control-label">Dari Tanggal</label>
                      <div class="input-prepend input-group">
                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <input class="form-control col-md-7 col-xs-12" type="date" name="tgl_a" required>
                      </div>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label">Sampai Tanggal</label>
                    <div class="input-prepend input-group">
                      <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                      <input class="form-control col-md-7 col-xs-12" type="date" name="tgl_b" required>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="cetak" value="Cetak">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- akhir cetak berdasarkan tanggal -->

          <div class="clearfix"></div>

          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Transaksi Barang Masuk</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="table table-striped table-bordered table-hover" id="datatables" style="width: 100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Nama Supplier</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang Masuk</th>
                        <th>Harga Barang</th>
                        <th>Total</th>
                        <th>Waktu</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      // untuk koneksi
                      include_once ('../db/koneksi.php');

                      $query = "SELECT * FROM dta_trnsaksi_brng_masuk";
                      $result = $mysqli->query($query);

                      $no = 1;
                      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                       ?>
                       <tr>
                         <td><?php echo $no ?></td>
                         <td><?php echo $row['id_transaksi']; ?></td>
                         <td><?php echo $row['nmasup']; ?></td>
                         <td><?php echo $row['nmabar']; ?></td>
                         <td align="center"><?php echo $row['jumlah']; ?></td>
                         <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
                         <td><?php echo "Rp. ". number_format($row['total'], 0, ",", "."); ?></td>
                         <td><?php echo $row['waktu']; ?></td>
                       </tr>

                     <?php
                     $no++;
                     }
                     ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- akhir row tabel -->

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
