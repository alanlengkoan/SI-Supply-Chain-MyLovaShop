    <!-- untuk bagian head -->
    <?php include_once ('head.php'); ?>

    <body class="nav-md" onload="setInterval('reloadwaktu()');">

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
                  <h3>Transaksi Barang Masuk</h3>
                </div>
              </div>

              <div class="clearfix"></div>

              <!-- untuk bagian waktu -->
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="tile-stats">
                    <div class="waktu">
                      <p id="getwaktu"></p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- akhir row waktu -->

              <?php
              // validasi untuk proses simpan, ubah, hapus data barang masuk
              if (isset($_GET['simpan'])) {

                echo '
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  Transaksi Barang Masuk Berhasil Ditambahkan !
                </div>';

              } else if (isset($_GET['hapus'])) {

                echo '
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  Hapus Transaksi Barang Masuk Berhasil !
                </div>';

              }
               ?>

              <!-- untuk bagian tabel dan awal row tabel -->
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Data Transaksi Barang Masuk</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <table class="table table-striped table-bordered" id="datatables" style="width: 100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th>Jumlah <br> Barang Masuk</th>
                            <th>Harga Barang</th>
                            <th>Total</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                          // untuk koneksi
                          include_once ('../db/koneksi.php');

                          $sql    = "SELECT * FROM dta_trnsaksi_brng_masuk";
                          $result = $mysqli->query($sql);

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
                              <td align="center">
                                <a class="btn btn-success" href="brng_masuk_detail.php?id_transaksi=<?php echo $row['id_transaksi'] ?>"><i class="fa fa-folder-open"></i> </a>
                                <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row['id_transaksi'] ?>" data-toggle="modal" data-target="#modal-konfirmasihapusbarangmasuk"><i class="fa fa-trash"></i> </a>
                              </td>
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

              <!--Modal konfirmasi menggunakan bootstrap 3.3.7-->
              <div class="modal fade" id="modal-konfirmasihapusbarangmasuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Konfirmasi</h4>
                          </div>
                          <div class="modal-body">
                              Apakah Anda Yakin Ingin Menghapus Transaksi Barang Masuk Ini ?
                          </div>
                          <div class="modal-footer">
                            <a href="javascript:;" id="hapus-data-barangmasuk" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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

    <!-- untuk bagian foot -->
    <?php include_once ('foot.php'); ?>

    <!-- koding javascript -->
    <script type="text/javascript">

      // koding hapus data
      $(document).ready(function () {

        $('#modal-konfirmasihapusbarangmasuk').on('show.bs.modal',
        function (event)
        {
          var div   = $(event.relatedTarget)
          var id    = div.data('id')
          var modal = $(this);
          modal.find('#hapus-data-barangmasuk').attr("href","brng_masuk_hapus.php?id_transaksi="+id);
        })

      });

      // pengambilan waktu
      function reloadwaktu() {
        var waktu = new Date();
        var tanggal = waktu.getDate();
        var bulan   = waktu.getMonth();
        var tahun   = waktu.getFullYear();
        var jam     = waktu.getHours();
        var menit   = waktu.getMinutes();
        var detik  = waktu.getSeconds();
        document.getElementById('getwaktu').innerHTML =
        "Tanggal, Waktu : " + tanggal + "/" + bulan + "/" + tahun + ", "
        + jam + ":" + menit + ":" + detik;
      }
    </script>
