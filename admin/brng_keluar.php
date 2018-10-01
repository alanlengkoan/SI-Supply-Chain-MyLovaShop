    <!-- untuk bagian head -->
    <?php include_once ('head.php') ?>

    <!-- untk pemberian kode otomatis -->
    <?php

    $sql    = "SELECT id_transaksi FROM dta_trnsaksi_brng_keluar";
    $carkod = $mysqli->query($sql);
    $datkod = $carkod->fetch_array(MYSQLI_ASSOC);
    $jumdat = $carkod->num_rows;

    if ($datkod) {
      $nilkod  = substr($jumdat[0], 1);
      $kode    = (int) $nilkod;
      $kode    = $jumdat + 1;
      $kodeoto = "TRSBK-".str_pad($kode, 4, "0", STR_PAD_LEFT);
    } else {
      $kodeoto = "TRSBK-0001";
    }
     ?>

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
                  <h3>Transaksi Barang Keluar</h3>
                </div>
              </div>

              <div class="clearfix"></div>

              <!-- untuk bagian waktu -->
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    <div class="waktu">
                      <p id="getwaktu"></p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- akhir row waktu -->

              <!-- untuk bagian tabel dan awal row tabel -->
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Form Barang Keluar</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <!-- form tambah barang -->
                      <form class="form-horizontal form-label-left" action="brng_keluar.php" method="post">

                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Transaksi</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" name="inpidtrans" value="<?php echo $kodeoto; ?>" readonly>
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier <span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" name="inpidsup" onchange="namasupplier(this.value);" required>
                              <option>- ID Supplier -</option>
                              <?php
                              // ambil data dari database untuk ID Supplier
                              $sql      = "SELECT * FROM dta_supplier";
                              $supplier = $mysqli->query($sql);
                              $jsarray  = "var idsup = new Array();";
                              // menampilkan data
                              while ($row = $supplier->fetch_array(MYSQLI_ASSOC)) {
                              ?>
                                <option value="<?php echo $row['id_supplier'] ?>"><?php echo $row['id_supplier']; ?></option>
                              <?php
                              // menampilkan data hasil dipilih
                              $jsarray .= "idsup['".$row['id_supplier']."'] = {namasup: '".addslashes($row['nama'])."'};";
                                }
                               ?>
                            </select>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input id="setsupplier" class="form-control col-md-7 col-xs-12" type="text" name="inpnmasup" placeholder="Nama Supplier" readonly>
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang <span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" name="inpkdbar" onchange="namabarang(this.value);" required>
                              <option>- Kode Barang -</option>
                              <?php
                               // ambil data dari database untuk Kode Barang
                               $sql      = "SELECT * FROM dta_barang";
                               $barang   = $mysqli->query($sql);
                               $jsarray2 = "var kdbar = new Array();";
                               // menampilkan data
                               while ($row = $barang->fetch_array(MYSQLI_ASSOC)) {
                                ?>
                                 <option value="<?php echo $row['kd_barang'] ?>"><?php echo $row['kd_barang']; ?></option>
                               <?php
                               // menampilkan data hasil dipilih
                               $jsarray2 .= "kdbar['".$row['kd_barang']."'] = {namabar: '".addslashes($row['nama'])."', hargabar: '".addslashes($row['harga'])."'};";
                                  }
                               ?>
                            </select>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input id="setbarang" class="form-control col-md-7 col-xs-12" type="text" name="inpnmabar" placeholder="Nama Barang" readonly>
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Barang Keluar<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="jmlah" class="form-control col-md-7 col-xs-12" type="number" name="inpjumlah" onkeyup="jumlah();" required>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                            <input id="setharga" class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inphrga" onkeyup="jumlah();" placeholder="Harga Barang" readonly>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Total <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                            <input id="total" class="form-control col-md-7 col-xs-12 has-feedback-left" type="text" name="inptotal" placeholder="Total Harga" readonly>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Pengantaran <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="inpstatus" required>
                              <option>- Status Pengantaran -</option>
                              <option>On-Process</option>
                              <option>Delivered</option>
                              <option>Redelivered</option>
                            </select>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <input class="btn btn-warning" type="reset" name="kosongkan" value="Kosongkan">
                            <input class="btn btn-success" type="submit" name="keluar" value="Keluar">
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
                              <li><b>On-Process</b> adalah Barang telah dalam tahapan proses pengantaran. </li>
                              <li><b>Delivered</b> adalah Barang telah sampai atau sudah diterima di alamat tujuan. </li>
                              <li><b>Redelivered</b> adalah Barang akan dikirim kembali, ini disebabkan penerima tidak ada ditempat. </li>
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
       if (isset($_POST['keluar'])) {
         $idtrns = $_POST['inpidtrans'];
         $idsup  = $_POST['inpidsup'];
         $nmasup = $_POST['inpnmasup'];
         $kdbar  = $_POST['inpkdbar'];
         $nmabar = $_POST['inpnmabar'];
         $jmlah  = $_POST['inpjumlah'];
         $hrga   = $_POST['inphrga'];
         $total  = $_POST['inptotal'];
         $status = $_POST['inpstatus'];
         // waktu zona asia jakarta
         date_default_timezone_set('Asia/Jakarta');
         $waktu  = date("Y-m-d H.i.s");

         $sql      = "SELECT * FROM dta_trnsaksi_brng_keluar WHERE id_transaksi = '$idtrns'";
         $q_idtrns = $mysqli->query($sql);

         if ($row = $q_idtrns->fetch_row()) {
           echo "<script>
                   window.alert('Transaksi Dengan ID = ".$idtrns." Sudah Di Proses !');
                   window.location=(href='brng_keluar.php')
                 </script>";
         } else {
           $query  = "INSERT INTO dta_trnsaksi_brng_keluar (id_transaksi, id_supplier, nmasup, kd_barang, nmabar,
                      jumlah, harga, total, status, waktu) VALUES ('$idtrns', '$idsup', '$nmasup', '$kdbar',
                      '$nmabar', '$jmlah', '$hrga', '$total', '$status', '$waktu')";
           $result = $mysqli->query($query);

           echo "<script>
                   window.location=(href='dt_barangkeluar.php?&simpan')
                 </script>";
         }
       }

       ?>

      <!-- koding javascript -->
      <script type="text/javascript">

      // prose penjumlahan
      function jumlah() {
        var txt1  = document.getElementById('jmlah').value;
        var txt2  = document.getElementById('setharga').value;
        var hasil = parseInt(txt1) * parseInt(txt2);
        if (!isNaN(hasil)) {
          document.getElementById('total').value = hasil;
        }
      }

      // menampilkan nama dan harga barang
      <?php echo $jsarray2; ?>
      function namabarang(kodebar) {
        document.getElementById('setbarang').value = kdbar[kodebar].namabar;
        document.getElementById('setharga').value = kdbar[kodebar].hargabar;
      }

      // menampilkan nama supplier
      <?php echo $jsarray; ?>
      function namasupplier(idsupplier) {
        document.getElementById('setsupplier').value = idsup[idsupplier].namasup;
      }

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

    <!-- untuk bagian foot -->
    <?php include_once ('foot.php'); ?>
