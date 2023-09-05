<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i><b><?= $title ?></b></i></h1>
    <hr/>
    <div class="card shadow">
        <div class="card-header py-3">
                <div class="float-left">
                    <a href="<?= base_url('petugas/daftar'); ?>" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-circle-left fa-md text-white-50"></i> Batal</a>
                </div>
            </div>
      <div class="col-lg-12">
        <div class="row">
            <div class="col-lg">
                <div class="p-3">
                <?= $this->session->flashdata('message'); ?>
                <form method="post" action="<?= base_url('petugas/tanggapan/'.$tanggapan['id_tanggapan']); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" id="id_tanggapan" name="id_tanggapan" value="<?= $tanggapan['id_tanggapan'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id_pengaduan" name="id_pengaduan" value="<?= $tanggapan['id_pengaduan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggapan"><b>Tanggapan *</b></label>
                        <script type="text/javascript" src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
                        <textarea class="ckeditor" style="height: 180px" id="tanggapan" name="tanggapan"></textarea>
                        <?= form_error('tanggapan', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="status2"><b>Status Pemeriksaan *</b></label><br>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status2" id="status2" value="Ditolak">
                        <label class="form-check-label" for="inlineRadio1">Ditolak</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status2" id="status2" value="Terbukti">
                        <label class="form-check-label" for="inlineRadio2">Terbukti</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status2" id="status2" value="Tidak Terbukti">
                        <label class="form-check-label" for="inlineRadio3">Tidak Terbukti</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file2"><b><i class="fas fa-paperclip"> &nbsp;</i>Lampirkan File *</b></label>
                        <input type="file" class="form-control-file" id="attachment" name="attachment">
                        <br>
                        <a style="font-size: 12px;"><b>CATATAN :</b></a><br>
                        <a style="font-size: 11px;">* Maksimal kapasitas file yang diperkenankan adalah sebesar 2MB.</a><br>
                        <a style="font-size: 11px;">* Tipe/format file yang diizinkan adalah .ZIP, .RAR, .DOC, .DOCX, .XLS, .XLSX, .PDF, .JPG, .JPEG, .PNG</a>
                        <?= form_error('file2', '<small class="text-danger pl-3">', '</small>');
                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin? setelah Anda klik Kirim, maka Tanggapan tidak dapat diubah lagi. Silahkan cek kembali Data Tanggapan Anda!')">
                            Kirim Tanggapan
                        </button>
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                </form>
                <br>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="form-group" style="margin-top: 15px;" align="center">
        <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
    </div>
</div>