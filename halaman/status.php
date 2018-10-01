<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SI Logistik Pergudangan</title>

    <!-- Bootstrap -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
      <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="">Menu</span>
        </button>
        <a class="navbar-brand" href="index.php">Logistik Allen</a>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Layanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Jasa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="status.php">Status</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="masuk.php">Masuk</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <!-- Header -->
    <header class="intro-header">
      <div class="container">
        <div class="intro-message">
          <h2>Sistem Informasi Logistik Pergudangan Berbasis Website</h2>
          <hr class="intro-divider">
        </div>
      </div>
    </header>

    <!-- untuk bagian mencari status pengantaran -->
    <section class="content-section-a">

      <div class="container">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <div class="clearfix"></div>
            <!-- awal form status -->
            <form role="form" action="status.php" method="post">
                <div class="form-group">
                    <label>Masukkan ID Transaksi *</label>
                    <input class="form-control" type="text" name="inpidtrns" placeholder="TRSBK-0001" required>
                </div>
                <div class="form-group">
                    <label>Masukkan Kode Keamanan *</label>
                    <br>
                    <img class="kodeacak" src="captcha.php" alt="gambar">
                    <br>
                    <br>
                    <input class="form-control" type="text" name="inpkode" placeholder="Kode Keamanan" required>
                </div>
                <input class="btn btn-warning" type="reset" name="kosongkan" value="Kosongkan">
                <input class="btn btn-success" type="submit" name="cari" value="Cari">
            </form>
            <!-- akhir form status -->
          </div>

          <!-- untuk bagian menampilkan tabel status -->
          <div class="col-lg-8 mr-auto">
            <hr class="garis-bawah">
            <div class="clearfix"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Status Pengataran Barang
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID Transaksi</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga Barang</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          // untuk koneksi
                          include_once ('../db/koneksi.php');

                          if (isset($_POST['cari'])) {
                            $idtrns = $_POST['inpidtrns'];
                            $kdacak = $_POST['inpkode'];

                            // proses validasi kode acak atau captcha
                            if (isset($_POST['inpkode']) && $kdacak != "" && $_SESSION['kode'] == $kdacak) {

                              // jika yang dimasukkan benar maka akan ditampilkan
                              $sql   = "SELECT * FROM dta_trnsaksi_brng_keluar WHERE id_transaksi = '$idtrns'";
                              $query = $mysqli->query($sql);

                              // validasi apa bila data ID yang dicari ada
                              if ($idkode = $query->fetch_row()) {
                                // menampilkan data
                                $sql  = "SELECT * FROM dta_trnsaksi_brng_keluar WHERE id_transaksi = '$idtrns'";
                                $data = $mysqli->query($sql);

                                while ($row = $data->fetch_array(MYSQLI_ASSOC)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $row['id_transaksi']; ?></td>
                                    <td><?php echo $row['nmasup']; ?></td>
                                    <td><?php echo $row['nmabar']; ?></td>
                                    <td align="center"><?php echo $row['jumlah']; ?></td>
                                    <td><?php echo "Rp. ". number_format($row['harga'], 0, ",", "."); ?></td>
                                    <td><?php echo "Rp. ". number_format($row['total'], 0, ",", "."); ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['waktu']; ?></td>
                                    <td align="center">
                                      <a class="btn btn-primary" href="../laporan/brng_keluar_cetak.php?id_transaksi=<?php echo $row['id_transaksi'] ?>" target="_blank"><i class="fa fa-print"></i> </a>
                                    </td>
                                  </tr>
                                  <?php
                                  }
                              } else {
                                // validasi data ID yang dicari tidak ada
                                echo '
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                Transaksi Dengan ID = <strong>'.$idtrns.'</strong> Tidak Ada !
                                </div>
                                ';
                              }
                            } else {
                                  // jika kode yang dimasukkan salah
                                  echo '
                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  <strong>Kode</strong> Yang Anda Masukkan Salah !
                                  </div>
                                  ';
                                  }
                              }
                            ?>
                        </tbody>
                    </table>

                  </div>
                </div>
                <!-- /.panel-body -->
              </div>
              <!-- /.panel -->
            </div>
            <!-- akhir div tabel -->
          </div>
          <!-- akhir row -->
        </div>
        <!-- /.container -->
      </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Layanan</a>
          </li>
          <li class="footer-menu-divider list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="#about">Jasa</a>
          </li>
          <li class="footer-menu-divider list-inline-item">&sdot;</li>
          <li class="list-inline-item">
            <a href="#services">Tentang</a>
          </li>
        </ul>
        <p class="copyright text-muted small">Copyright &copy; Alan Saputra Lengkoan - 2015020007</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
