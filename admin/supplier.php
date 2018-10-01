<!-- untuk bagian head -->
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
                <h3>Supplier</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <!-- button tambah data -->
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="supplier_tmbh.php" class="btn btn-primary">Tambah Supplier</a>
              </div>
            </div>

            <div class="clearfix"></div>

            <?php
            // validasi untuk proses simpan, ubah, hapus data barang masuk
            if (isset($_GET['simpan'])) {

              echo '
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Data Supplier Berhasil Ditambahkan !
              </div>';

            } else if (isset($_GET['ubah'])) {

              echo '
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Ubah Data Supplier Berhasil !
              </div>';

            } else if (isset($_GET['hapus'])) {

              echo '
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Hapus Data Supplier Berhasil !
              </div>';

            }
             ?>

            <!-- untuk bagian tabel dan awal row tabel -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Supplier</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped table-bordered" id="datatables" style="width: 100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>ID Supplier</th>
                              <th>Nama Supplier</th>
                              <th>No. Hp / Telepon</th>
                              <th>Fax</th>
                              <th>Email</th>
                              <th>Website</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php
                          // untuk koneksi
                          include_once ('../db/koneksi.php');

                          $query  = "SELECT * FROM dta_supplier";
                          $result = $mysqli->query($query);

                          $no = 1;
                          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                           ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $row['id_supplier']; ?></td>
                              <td><?php echo $row['nama']; ?></td>
                              <td><?php echo $row['nomor']; ?></td>
                              <td><?php echo $row['fax']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['website']; ?></td>
                              <td><?php echo $row['alamat']; ?></td>
                              <td align="center">
                                <a class="btn btn-success" href="supplier_detail.php?id_supplier=<?php echo $row['id_supplier'] ?>"><i class="fa fa-folder-open"></i> </a>
                                <a class="btn btn-primary" href="supplier_ubah.php?id_supplier=<?php echo $row['id_supplier'] ?>"><i class="fa fa-edit"></i> </a>
                                <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row['id_supplier'] ?>" data-toggle="modal" data-target="#modal-konfirmasihapussupplier"><i class="fa fa-trash"></i> </a>
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
            <div class="modal fade" id="modal-konfirmasihapussupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Ingin Menghapus Data Supplier Ini ?
                        </div>
                        <div class="modal-footer">
                          <a href="javascript:;" id="hapus-data-supplier" class="btn btn-danger">Hapus</a>
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

  <!-- koding hapus -->
  <script type="text/javascript">
    $(document).ready(function () {

      $('#modal-konfirmasihapussupplier').on('show.bs.modal',
      function (event)
      {
        var div   = $(event.relatedTarget)
        var id    = div.data('id')
        var modal = $(this);
        modal.find('#hapus-data-supplier').attr("href","supplier_hapus.php?id_supplier="+id);
      })

    });
  </script>
