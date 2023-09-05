<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <h1 class="h3 mb-0 text-gray-800" style="font-family: Viga;"><?= $title; ?></h1>
  </div>
  <hr>
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-70 py-0">
        <a class="nav-link" href="<?= base_url('admin/data_aduanmasuk'); ?>">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Aduan Masuk</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totaladuanmasuk; ?></div>
              <div class="mt-1" align="right" style="font-size: 14px">Detail <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>
    
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-70 py-0">
        <a class="nav-link" href="<?= base_url('admin/data_aduanpending'); ?>">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pending; ?></div>
              <div class="mt-1" align="right" style="font-size: 14px">Detail <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-70 py-0">
        <a class="nav-link" href="<?= base_url('admin/data_aduanproses'); ?>">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Proses</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $proses; ?></div>
              <div class="mt-1" align="right" style="font-size: 14px">Detail <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-70 py-0">
        <a class="nav-link" href="<?= base_url('admin/data_aduanapproved'); ?>">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Approved</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $approved; ?></div>
              <div class="mt-1" align="right" style="font-size: 14px">Detail <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-70 py-0">
        <a class="nav-link" href="<?= base_url('admin/data_aduanselesai'); ?>">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Selesai</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $selesai; ?></div>
              <div class="mt-1" align="right" style="font-size: 14px">Detail <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>

  </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-6">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Grafik Penanganan Aduan</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myChart"></canvas>

            <?php
            //Inisialisasi nilai variabel awal
            $status = "";
            $jumlah = null;
            foreach ($chartaduan as $item)
              {
                $stat=$item->status;
                $status .= "'$stat'". ", ";
                $jum=$item->total;
                $jumlah .= "$jum". ", ";
              }
            ?>

          <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                //labels:
                labels: [<?php echo $status; ?>],
                datasets: [{
                    label:'Data Aduan',
                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(252, 165, 3)', 'rgb(56, 86, 255, 0.87)','rgb(60, 179, 113)'],
                    borderColor: ['rgb(255, 99, 132)'],
                    data: [<?php echo $jumlah; ?>]
                }]
                },
                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
          </script>

          </div>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-6 col-lg-6">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Grafik Status Aduan</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie">
            <canvas id="myPieChart"></canvas>
            
            <?php
            //Inisialisasi nilai variabel awal
            $status2 = "";
            $jumlah = null;
            foreach ($piechartaduan as $item)
              {
                $stat2=$item->status2;
                $status2 .= "'$stat2'". ", ";
                $jum=$item->total;
                $jumlah .= "$jum". ", ";
              }
            ?>

          <script>
            var ctx = document.getElementById('myPieChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'pie',
                // The data for our dataset
                data: {
                //labels: 
                labels: [<?php echo $status2; ?>],
                datasets: [{
                    label:'Data Aduan',
                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(252, 165, 3)', 'rgb(56, 86, 255, 0.87)','rgb(60, 179, 113)'],
                    borderColor: ['rgb(255, 99, 132)'],
                    data: [<?php echo $jumlah; ?>]
                }]
                },
                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
          </script>

          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="form-group" style="margin-top: 10px;" align="center">
        <span class="small float-center" style="font-size: 10px;">Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</span>
    </div>
</div>

