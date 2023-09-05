        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><i><b><?= $title ?></b></i></h1>
          <hr/>

          <!-- DataTales Example -->
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-left">
                    <a href="<?= base_url('admin/data_aduanselesai'); ?>" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-circle-left fa-md text-white-50"></i> Kembali</a>
                </div>
                <div class="float-right">
                    <a href="<?= base_url('admin/print_tanggapan/'.$detail['id_pengaduan']); ?>" class="btn btn-sm btn-secondary shadow-sm" target="_blank"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                </div>
            </div>
            <div class="card-body">
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
                          <td width="70%">
                            <?php if($detail['file'] != 'Tidak Ada Bukti Dukung yang Dilampirkan') { ?>
                              <a href="<?= base_url('assets/upload/'. $detail['file']); ?>" target="_blank"><?= $detail['file']; ?></a>
                              <?php } else {
                                echo "<font color='Red'>Tidak Ada Bukti Dukung yang Dilampirkan.</font>";
                            } ?>
                          </td>
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
                          <td width="70%"><?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?><?= strftime("%A, %d %B %Y", strtotime($detail['tanggal_tanggapan'])) ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Detail Tanggapan</b></td>
                          <td width="70%"><?= htmlspecialchars_decode($detail['isi_tanggapan']); ?></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Dok. Lampiran</b></td>
                          <td width="70%"><a href="<?= base_url('assets/upload/'. $detail['file2']); ?>" target="_blank"><?= $detail['file2']; ?></a></td>
                        </tr>
                        <tr>
                          <td width="30%"><b>Status</b></td>
                          <td width="70%"><b><i><?= $detail['status2'] ?></i></b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <div class="form-group" style="margin-top: 10px;" align="center">
          <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
        </div>
</div>