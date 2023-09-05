        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
          <h1 class="h3 mb-2 text-gray-800" style="font-family: Viga"><?= $title ?></h1>
          <hr/>

          <!-- DataTales Example -->
          <div class="card shadow mb-2">
            <div class="card-header py-3">
                <div class="float-right">
                    <a href="<?= base_url('admin/print_data_masyarakat'); ?>" class="btn btn-sm btn-secondary shadow-sm" target="_blank"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>No.</th>
                      <th>NIP / NIK</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Telp.</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($data_masyarakat as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nik']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td align="justify"><?= $row['alamat']; ?></td>
                        <td><?= $row['telp']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td align="center">
                            <a href="<?= base_url('admin/hapus_masyarakat/' . $row["nik"]); ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i> Hapus</a>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="form-group" style="margin-top: 10px;" align="center">
            <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
          </div>
        </div>