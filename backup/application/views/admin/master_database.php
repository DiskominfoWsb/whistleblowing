<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <h1 class="h3 mb-0 text-gray-800" style="font-family: Viga;" align="center">Manajemen Database</h1>
  </div>

  <hr class="sidebar-divider d-none d-md-block">

    <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4 mt-2">
      <?= $this->session->flashdata('message'); ?>
      <div class="card border-left-success shadow h-100 py-2">
        <a class="nav-link" href="<?= base_url('admin/backup_database'); ?>">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-lg font-weight-bold text-success text-uppercase mb-1"><i class="fa fa-database" aria-hidden="true"></i>&nbsp; Backup Database</div>
              <div class="mt-3" align="right">Backup <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>
    
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4 mt-2">
      <div class="card border-left-primary shadow h-100 py-2">
        <a class="nav-link" href="#" onclick="return confirm('Anda yakin akan me-Restore Database? Pastikan Database yang Anda Upload Benar. ')"> 
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-lg font-weight-bold text-primary text-uppercase mb-1"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Restore Database</div>
              <div class="mt-3" align="right">Restore <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>
    <div class="form-group" style="margin-top: 265px;" align="center">
        <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
    </div>
</div>