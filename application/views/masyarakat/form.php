<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i><b><?= $title ?></b></i></h1>
    <hr/>
    <div class="card bg-light">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
              <div class="col-lg">
                <?= $this->session->flashdata('message'); ?>
                <form method="post" action="<?= base_url('masyarakat/form'); ?>" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <label for="tanggal" style="font-size: 14px"><b>Tanggal Pengaduan *</b></label>
                        <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?= set_value('tanggal'); ?>">
                        <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="kategori" style="font-size: 14px"><b>Kategori *</b></label>
                        <select class="form-control form-control-sm" id="kategori" name="kategori">
                            <option value="">Pilih Kategori ...</option>
                                <?php $kategori  = array('Penyimpangan dari Tugas dan Fungsi','Gratifikasi','Benturan Kepentingan','Melanggar Peraturan dan Perundangan yang berlaku','Tindak Pidana Korupsi');
                                    for ($i = 0; $i < sizeof($kategori); $i++) {
                                        if ($kategori[$i] == 'Penyimpangan dari Tugas dan Fungsi') {
                                            echo "<option value='1'>".$kategori[$i]."</option>";
                                        } else if ($kategori[$i] == 'Gratifikasi') {
                                            echo "<option value='2'>".$kategori[$i]."</option>";
                                        } else if ($kategori[$i] == 'Benturan Kepentingan') {
                                            echo "<option value='3'>".$kategori[$i]."</option>";
                                        } else if ($kategori[$i] == 'Melanggar Peraturan dan Perundangan yang berlaku') {
                                            echo "<option value='4'>".$kategori[$i]."</option>";
                                        } else {
                                            echo "<option value='5'>".$kategori[$i]."</option>";
                                        }
                                    }
                                ?>
                        </select>
                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_terlapor" style="font-size: 14px"><b>Nama Terlapor *</b></label>
                        <input type="text" class="form-control form-control-sm" id="nama_terlapor" name="nama_terlapor" value="<?= set_value('nama_terlapor'); ?>">
                        <?= form_error('nama_terlapor', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="lokasi_kejadian" style="font-size: 14px"><b>Lokasi Kejadian *</b></label>
                        <textarea class="form-control form-control-sm" style="height: 65px" id="lokasi_kejadian" name="lokasi_kejadian"></textarea>
                        <?= form_error('lokasi_kejadian', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kejadian" style="font-size: 14px"><b>Tanggal Kejadian *</b></label>
                        <input type="date" class="form-control form-control-sm" id="tanggal_kejadian" name="tanggal_kejadian" value="<?= set_value('tanggal_kejadian'); ?>">
                        <?= form_error('tanggal_kejadian', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                </div>
                </div>
                <div class="col-lg">
                    <div class="form-group mt-3">
                        <label for="isi" style="font-size: 14px"><b>Isi Pengaduan ( Max 2.000 Karakter ) *</b></label>
                        <textarea class="form-control form-control-sm" style="height: 160px" id="isi" name="isi"></textarea>
                        <?= form_error('isi', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="file" style="font-size: 14px"><b><i class="fas fa-paperclip"> &nbsp;</i>Lampirkan File Bukti Dukung *</b></label>
                        <div class="card bg-white mb-2">
                        <input type="file" class="form-control-file" id="attachment" name="attachment">
                        </div>                       
                        <a style="font-size: 12px;"><b>CATATAN :</b></a><br>
                        <a style="font-size: 11px;">* Maksimal kapasitas file yang diperkenankan adalah sebesar <b>2MB</b>.</a><br>
                        <a style="font-size: 11px;">* Untuk mempermudah Tim dalam melakukan Pemeriksaan Berkas dan Klarifikasi, <b>File Bukti Dukung</b> dimohon dijadikan dalam <b>1 Folder</b> dalam bentuk <b>ZIP / RAR</b> atau dijadikan <b>1 File</b> dalam bentuk <b>PDF</b>.</a><br>
                        <a style="font-size: 11px;">* Tipe/format file yang diizinkan adalah <b>.ZIP, .RAR, .PDF</b></a>
                        <?= form_error('file', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin? setelah Anda klik Kirim Pengaduan, maka Data Aduan tidak dapat diubah lagi. Silahkan cek kembali Data Pengaduan Anda!')">
                            Kirim Pengaduan
                        </button>
                        <button type="reset" class="btn btn-warning btn-sm">
                            Reset
                        </button>
                        <a href="<?= base_url('masyarakat'); ?>" class="btn btn-sm btn-danger shadow-sm">Batal</a>
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                </form>
                <br>
                </div>
            </div> <!-- batas -->
        </div>
    </div>
  </div>              
    <div class="form-group" style="margin-bottom: 10px; margin-top: 10px" align="center">
        <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
    </div>
</div>