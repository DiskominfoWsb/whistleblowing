<div class="container">
    <!-- Page Heading -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <h1 class="h3 mb-2 text-gray-800" style="font-family: Viga"><?= $title ?></h1>
    <hr/>
    <a href="<?= base_url('admin/data_kategori'); ?>" class="btn btn-sm btn-danger mb-3"><i class="fas fa-arrow-circle-left fa-md text-white-50"></i> Kembali</a>
        <div class="col-lg-12">
            <div class="card shadow bg-light" style="width: 550px; height: 200px">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <?= $this->session->flashdata('message'); ?>
                                <form method="post" action="<?= base_url('admin/tambah_kategori'); ?>">
                                    <div class="form-group ">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Kategori">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Simpan
                                        </button>
                                        <button type="reset" class="btn btn-sm btn-warning">
                                            Reset
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
        <div class="form-group" style="margin-top: 190px;" align="center">
            <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
        </div>
</div>