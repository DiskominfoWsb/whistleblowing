<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
    <div class="sidebar-brand-icon">
    <i class="fab fa-google-wallet"></i>
    </div>
        <div class="sidebar-brand-text mx-1">Whistleblowing<br>Wonosobo</div>
    </a>

    <hr class="sidebar-divider my-0">
    <?php
    $level = $this->session->userdata('level');
     if ($level == "admin") { ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>        
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-users"></i>
                <span>Data User</span>
            </a>
            <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded"> 
                    <a class="collapse-item" href="<?= base_url('admin/data_petugas') ?>"><i class="fas fa-fw fa-user-edit"></i>&nbsp; Data Petugas</a>
                    <a class="collapse-item" href="<?= base_url('admin/data_masyarakat') ?>"><i class="fas fa-address-book"></i>&nbsp;&nbsp; Data Pelapor</a>
                    <a class="collapse-item" href="<?= base_url('admin/data_user') ?>"><i class="fas fa-user-secret"></i>&nbsp;&nbsp; Data User</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i> 
                <span>Data Aduan</span>
            </a>
            <div id="collapseData" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('admin/data_kategori') ?>"><i class="fas fa-fw fa-folder-open"></i>&nbsp; Kategori</a>
                    <a class="collapse-item" href="<?= base_url('admin/data_pengaduan') ?>"><i class="fas fa-fw fa-copy"></i>&nbsp; Daftar Pengaduan</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span>
            </a>
            <div id="collapsePengaturan" class="collapse" aria-labelledby="HeadingPengaturan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded"> 
                    <a class="collapse-item" href="<?= base_url('admin/manage_database'); ?>"><i class="fas fa-fw fa-database"></i>&nbsp; Database</a>
                    <a class="collapse-item" href="<?= base_url('auth/ubah_password'); ?>"><i class="fas fa-fw fa-key"></i>&nbsp; Ubah Password</a>
                    <a class="collapse-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp; Logout</a>
                </div>
            </div>
        </li>
    <?php } elseif ($level == "petugas") { ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('petugas') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('petugas/list_aduanmasuk'); ?>">
                <i class="fas fa-envelope"></i>
                <span>Data Pengaduan Masuk</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('petugas/list_tanggapan'); ?>">
                <i class="fas fa-fw fa-folder-open"></i>
                <span>List Tanggapan</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span>
            </a>
            <div id="collapsePengaturan" class="collapse" aria-labelledby="HeadingPengaturan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('auth/ubah_password'); ?>"><i class="fas fa-fw fa-key"></i>&nbsp; Ubah Password</a>
                    <a class="collapse-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp; Logout</a>
                </div>
            </div>
        </li>
        
    <?php } else { ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('masyarakat'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('masyarakat/form'); ?>">
                <i class="fas fa-file-signature"></i>
                <span>Form Pengaduan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('masyarakat/list_aduansaya'); ?>">
                <i class="fas fa-fw fa-folder-open"></i>
                <span>Pengaduan Saya</span></a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span>
            </a>
            <div id="collapsePengaturan" class="collapse" aria-labelledby="HeadingPengaturan" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('auth/ubah_password'); ?>"><i class="fas fa-fw fa-key"></i>&nbsp; Ubah Password</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin akan keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" untuk mengakhiri Session Anda.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary btn-sm" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- End of Logout Modal-->