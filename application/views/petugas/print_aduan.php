<body onload="window.print()">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h4 mt-3 text-gray-800" align="center"><i><b><?= $title ?></b></i></h1>
          <hr/>
          <!-- DataTales Example -->
          
              <div class="row">
                <div class="col-md-6">
                  <div class="table-responsive-sm">
                    <table class="table table-bordered">
                      <thead>
                        <td colspan="2" align="center"><b>PENGADUAN</b></td>
                      </thead>
                      <tbody>
                        <tr>
                          <td width="30%"><b>Hari, Tanggal</b></td>
                          <td width="70%"><?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?><?= strftime("%A, %d %B %Y", strtotime($detail['tanggal_pengaduan'])) ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Nama Pelapor</b></td>
                          <td width="70%"><?= $detail['nama'] ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>NIP / NIK</b></td>
                          <td width="70%"><?= $detail['nik'] ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>No. HP</b></td>
                          <td width="70%"><?= $detail['telp'] ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Email</b></td>
                          <td width="70%"><?= $detail['email'] ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Alamat</b></td>
                          <td width="70%"><?= $detail['alamat'] ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Kategori WBS</b></td>
                          <td width="70%"><?= $detail['nama_kategori'] ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Nama Terlapor</b></td>
                          <td width="70%"><?= $detail['nama_terlapor'] ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Detail Pengaduan</b></td>
                          <td width="70%"><b>Hari, Tgl. Kejadian : </b><br><?= strftime("%A, %d %B %Y", strtotime($detail['tanggal_kejadian'])); ?><br><br><b>Lokasi Kejadian : </b><br><?= $detail['lokasi_kejadian'] ?><br><br><b>Isi Aduan : </b><br><?= $detail['isi_pengaduan'] ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Dok. Lampiran</b></td>
                          <td width="70%"><a><?= $detail['file']; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="table-responsive-sm">
                    <table class="table table-bordered">
                      <thead>
                        <td colspan="2" align="center"><b>TANGGAPAN</b></td>
                      </thead>
                      <tbody>
                        <tr>
                          <td width="30%"><b>Hari, Tanggal</b></td>
                          <td width="70%"></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Dok. Lampiran</b></td>
                          <td width="70%"></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Status</b></td>
                          <td width="70%"></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Detail Tanggapan</b></td>
                          <td width="70%"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
</body>