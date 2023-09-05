        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><i><b><?= $title ?></b></i></h1>
          <hr/>

          <!-- DataTales Example -->
          <div class="card shadow mb-2">
            <div class="card-header py-3">
                <div class="float-left">
                    <a href="<?= base_url('masyarakat'); ?>" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-circle-left fa-md text-white-50"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>No.</th>
                      <th>Tgl. Aduan / Kategori</th>
                      <th>Pengaduan</th>
                      <th>Tracking</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($data_pengaduan as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><b>Tgl. Aduan :</b><br><?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?><?= strftime("%A, %d %B %Y", strtotime($row['tanggal_pengaduan'])); ?><br><b>Kategori Aduan :</b><br><?= $row['nama_kategori']; ?></td>
                      <td><b>Tgl. Kejadian :</b><br><?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?><?= strftime("%A, %d %B %Y", strtotime($row['tanggal_kejadian'])) ?><br><b>Lokasi : </b><br><?= $row['lokasi_kejadian']; ?><br><b>Nama Terlapor :</b><br><?= $row['nama_terlapor']; ?><br><b>Isi Aduan :</b><br><?= $row['isi_pengaduan']; ?><br><b><i class="fas fa-paperclip"> &nbsp;</i></b>
                        <?php if($row['file'] != 'Tidak Ada Bukti Dukung yang Dilampirkan') { ?>
                          <a href="<?= base_url('assets/upload/'. $row['file']); ?>" target="_blank"><?= $row['file']; ?></a>
                        <?php } else {
                            echo "<font color='Red'>Tidak Ada Bukti Dukung yang Dilampirkan.</font>";
                          } ?>
                      </td>
                      <td align="center">
                        <?php if($row['status'] == "Selesai"){ ?>
                          <a href="<?= base_url('masyarakat/detail2/'.$row['id_pengaduan']); ?>" class="btn btn-info btn-sm">Selesai</a>
                        <?php }else{ echo $row['status'];} ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
          <div class="form-group" style="margin-bottom: 10px;" align="center">
            <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
          </div>
      </div>