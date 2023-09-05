<body onload="window.print()">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
          <h1 class="h4 mt-3 text-gray-800" align="center" style="font-family: Viga"><?= $title ?></h1>
          <hr/>

          <!-- DataTales Example -->
              <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>NIP / NIK</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>Telp.</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($data_masyarakat as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['nik']; ?></td>
                        <td align="justify"><?= $row['alamat']; ?></td>
                        <td><?= $row['telp']; ?></td>
                        <td><?= $row['email']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
          </div>
      </div>
</body>