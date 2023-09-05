<body onload="window.print()">
    <!-- Begin Page Content -->
    <div class="container-fluid">

          <!-- Page Heading -->
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
          <h1 class="h4 mb-2 text-gray-800 mt-3" align="center" style="font-family: Viga"><?= $title ?></h1>
          <hr/>

          <!-- DataTales Example -->
              <div class="table-responsive">
                <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>No.</th>
                      <th>Tgl. Aduan / Kategori</th>
                      <th>Pelapor</th>
                      <th>Pengaduan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($data_pengaduan as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><b>Tgl. Aduan Masuk :</b><br><?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?><?= strftime("%A, %d %B %Y", strtotime($row['tanggal_pengaduan'])); ?><br><b>Kategori Aduan :</b><br><?= $row['nama_kategori']; ?></td>
                      <td><b>Nama : </b><br><?= $row['nama']; ?><br><b>NIP / NIK : </b><br><?=$row['nik']; ?><br><b>No. HP : </b><br><?=$row['telp']; ?><br><b>Alamat : </b><br><?=$row['alamat']; ?></td>
                      <td><b>Tgl. Kejadian :</b><br><?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?><?= strftime("%A, %d %B %Y", strtotime($row['tanggal_kejadian'])) ?><br><b>Lokasi : </b><br><?= $row['lokasi_kejadian']; ?><br><b>Nama Terlapor :</b><br><?= $row['nama_terlapor']; ?><br><b>Isi Aduan :</b><br><?= $row['isi_pengaduan']; ?><br><b><i class="fas fa-paperclip"> &nbsp;</i></b>
                        <?php if($row['file'] != 'Tidak Ada Bukti Dukung yang Dilampirkan') { ?>
                          <a><?= $row['file']; ?></a>
                        <?php } else {
                            echo "<font color='Red'>Tidak Ada Bukti Dukung yang Dilampirkan.</font>";
                          } ?>
                      </td>
                      <td align="center">
                        <?php if($row['status'] == 'Pending') { ?>
                          <a><font color="red"><b><i><?= $row['status']; ?></i></b></font></a>
                        <?php }else if($row['status'] == 'Proses') { ?>
                          <a><font color="orange"><b><i><?= $row['status']; ?></i></b></font></a>
                        <?php }else if($row['status'] == 'Approved') { ?>
                          <a><font color="blue"><b><i><?= $row['status']; ?></i></b></font></a>
                        <?php } else {
                            echo "<font color='green'><b><i>Selesai</i></b></font>";
                          } ?>
                      </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
          <div class="form-group" style="margin-top: 10px;" align="center">
            <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
          </div>
      </div>
</body>