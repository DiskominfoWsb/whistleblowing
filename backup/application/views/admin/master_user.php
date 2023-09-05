        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
          <h1 class="h3 mb-2 text-gray-800" style="font-family: Viga"><?= $title ?></h1>
          <hr/>

          <!-- DataTales Example -->
          <div class="card shadow mb-2">
            <div class="card-body">
              <div class="table-responsive">
              <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>No.</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($data_user as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?php if ($row['level'] == 'petugas') echo "Petugas"; else if ($row['level'] == 'guest') echo "Guest"; else echo $row['level']; ?></td>
                        <td align="center">
                          <?php 
                            if($row['level']=="petugas"){ ?>
                              <a href="<?= base_url("admin/ubah_user/" . $row['id_login']); ?>" class="badge badge-success"><i class="fas fa-fw fa-pencil-alt"></i> Ubah</a>
                              <a href="<?= base_url('admin/hapus_user/' . $row["id_login"]); ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i> Hapus</a>
                            <?php } elseif($row['level']=="masyarakat"){ ?>
                              <a href="<?= base_url('admin/hapus_user/' . $row["id_login"]); ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i> Hapus</a>
                            <?php }else{
                            echo ""; 
                          }
                          ?>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="form-group" style="margin-top: 20px;" align="center">
            <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
          </div>
</div>
