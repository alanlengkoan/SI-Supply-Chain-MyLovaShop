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
              <h3>Laporan Barang</h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <!-- awal cetak semua -->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <a href="../laporan/lap_barang_cetak.php" target="_blank">
                <button class="btn btn-success" type="submit" name="cetak">Cetak Semua</button>
              </a>
            </div>
          </div>
          <!-- akhir cetak semua -->

          <!-- untuk bagian tabel dan awal row tabel -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Barang</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped table-bordered table-hover" id="datatables" style="width: 100%">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Jumlah Barang</th>
                          <th>Harga Barang</th>
                          <th>Satuan</th>
                          <th>Kondisi</th>
                          <th>Stock Awal</th>
                          <th>Stock Terjual</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // untuk koneksi
                        include_once ('../db/koneksi.php');

                        $query  = "SELECT * FROM dta_barang";
                        $result = $mysqli->query($query);

                        $no = 1;
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                         ?>
                         <tr>
                           <td><?php echo $no ?></td>
                           <td><?php echo $row['kd_barang']; ?></td>
                           <td><?php echo $row['nama']; ?></td>
                           <td align="center"><?php echo $row['jumlah']; ?></td>
                           <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
                           <td><?php echo $row['satuan']; ?></td>
                           <td><?php echo $row['kondisi']; ?></td>
                           <td align="center"><?php echo $row['stock_awal']; ?></td>
                           <td align="center"><?php echo $row['stock_terjual']; ?></td>
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
