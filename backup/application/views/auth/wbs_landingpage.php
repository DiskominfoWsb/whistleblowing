<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>| WBS Wonosobo</title>
    <link href="<?= base_url('assets/');?>img/Lambang Wonosobo.png" rel="shortcut icon" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style_wbslandingpage.css" />
  </head>
  <body>
    <!-- navigasi -->
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top"
    >
      <div class="container">
        <a class="navbar-brand" href="#"><span class="icon"><i class="fab fa-google-wallet"></i></span>&nbsp; | &nbsp;WBS Wonosobo</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-right" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#definisi">Definisi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kriteria">Kriteria</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#tatacara">Tata Cara</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#partner">Partner</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kontak">Kontak Kami</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- banner -->
    <div class="container-fluid banner">
      <div class="container text-center">
        <img src="<?= base_url('assets/');?>img/Lambang Wonosobo.png" class="crop images bg-transparent mx-auto mt-3" width="100" height="110"/>
        <h4 class="display-6">Sugeng Rawuh Wonten</h4>
        <h3 class="display-2">Whistleblowing System (WBS)</h3>
        <h5 class="display-4"> Pemerintah Kabupaten Wonosobo</h5>
        <p class="card-text">Mari Bersama-sama Menciptakan Pemerintahan Yang Jujur dan Bersih, Laporkan Setiap Pelanggaran Yang Terjadi Di Lingkungan Kerja<br>Pemerintah Daerah Kabupaten Wonosobo</p>
        <a href="#definisi">
          <button type="button" class="btn btn-success btn-md mt-2">
            Definisi
          </button>
        </a>
      </div>
    </div>
    <!-- Definisi -->
    <div class="container-fluid layanan pt-5 pb-5">
      <div class="container text-center">
        <h2 class="display-3" id="definisi"></h2>
          <div class="card-body">
          <h2 class="display-3 pt-5">Definisi</h2><br>
            <blockquote class="blockquote mb-0">
              <footer class="blockquote-footer" align="justify"><b><i>Whistleblowing System (WBS)</i></b> <cite title="Source Title">adalah mekanisme penyampaian pengaduan dugaan tindak pidana tertentu yang telah terjadi atau akan terjadi yang melibatkan pegawai dan orang lain yang yang dilakukan dalam organisasi tempatnya bekerja, dimana pelapor bukan merupakan bagian dari pelaku kejahatan yang dilaporkannya.</cite></footer>
            </blockquote>
          </div>
      </div>
    </div>
    <!-- kriteria -->
    <div class="container-fluid pt-4 pb-5 bg-light">
      <div class="container text-center">
        <h2 class="display-3" id="kriteria"></h2><br>
          <blockquote class="blockquote mb-0">
          <h2 class="display-3 pt-5">Kriteria Pengaduan</h2><br>
            <footer class="blockquote-footer" align="justify">Jika <cite title="Source Title">Anda melihat atau mengetahui dugaan Tindak Pidana Korupsi atau bentuk pelanggaran lainnya yang dilakukan oleh ASN Di Lingkungan Pemerintah Kabupaten Wonosobo, silahkan melapor ke Inspektorat Kabupaten Wonosobo melalui Aplikasi Whistleblowing (WBS). Jika laporan anda memenuhi syarat/kriteria, maka laporan Anda akan diproses lebih lanjut. Adapun <b>Kriteria Pengaduan WBS</b> harus memenuhi syarat sebagai berikut :</cite></footer>
          </blockquote>
        <div class="row pt-4 gx-4 gy-4">
          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="<?= base_url('assets/');?>img/Wbs_What.png"
                class="card-img-top"
                width="200"
                height="200"
              />
              <div class="card-body">
                <h5 class="card-title">Apa?</h5>
                <p class="card-text">
                Apa perbuatan berindikasi Tindak Pidana Korupsi/pelanggaran yang diketahui.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="<?= base_url('assets/');?>img/Wbs_Who.png"
                class="card-img-top"
                width="200"
                height="200"
              />
              <div class="card-body">
                <h5 class="card-title">Siapa?</h5>
                <p class="card-text">
                Siapa yang bertanggungjawab/terlibat dan terkait dalam perbuatan tersebut.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="<?= base_url('assets/');?>img/Wbs_Where.png"
                class="card-img-top"
                width="200"
                height="200"
              />
              <div class="card-body">
                <h5 class="card-title">Dimana?</h5>
                <p class="card-text">
                Dimana tempat terjadinya perbuatan tersebut dilakukan.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="<?= base_url('assets/');?>img/Wbs_When.png"
                class="card-img-top"
                width="200"
                height="200"
              />
              <div class="card-body">
                <h5 class="card-title">Kapan?</h5>
                <p class="card-text">
                Kapan waktu perbuatan tersebut dilakukan.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="<?= base_url('assets/');?>img/Wbs_How.png"
                class="card-img-top"
                width="200"
                height="200"
              />
              <div class="card-body">
                <h5 class="card-title">Bagaimana?</h5>
                <p class="card-text">
                Bagaimana cara perbuatan tersebut dilakukan (modus, cara, dan sebagainya).
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="<?= base_url('assets/');?>img/Wbs_Evidence.png"
                class="card-img-top"
                width="200"
                height="200"
              />
              <div class="card-body">
                <h5 class="card-title">Bukti Dukung?</h5>
                <p class="card-text">
                  Dilengkapi dengan bukti permulaan (data, dokumen, gambar dan rekaman).
                </p>
              </div>
            </div>
          </div>
        </div><br>
          <blockquote class="blockquote mb-3 mt-3">
            <footer class="blockquote-footer" align="justify">Anda <cite title="Source Title">tidak perlu khawatir terungkapnya identitas diri anda karena Pemerintah Kabupaten Wonosobo akan <b>MERAHASIAKAN & MELINDUNGI</b> Identitas Anda sebagai <b>WHISTLEBLOWER</b>. Pemerintah Kabupaten Wonosobo sangat menghargai informasi yang Anda laporkan. Fokus kami kepada materi informasi yang Anda Laporkan. Sebagai bentuk terimakasih kami terhadap laporan yang Anda kirim, kami berkomitmen untuk merespon laporan Anda selambat-lambatnya 7 (tujuh) hari kerja sejak laporan Anda dikirim.</cite></footer>
          </blockquote>
      </div>
    </div>
    <!-- Tata Cara Pengaduan -->
    <div class="container-fluid pt-5 pb-5">
      <div class="container text-center">
        <h2 class="display-3" id="tatacara"></h2>
        <h2 class="display-3 pt-5">Tata Cara Pengaduan</h2>
        <p><i>Berikut ini adalah tatacara dalam membuat pengaduan melalui <b>Whistleblowing System (WBS)</b> Pemerintah Kabupaten Wonosobo, yaitu :</i></p>
        <div class="row pt-4 gx-4 gy-4">
          <!-- <div class="col-md-3 text-center tim"> -->
          <div class="col-md-3 text-center">
            <img
              src="<?= base_url('assets/');?>img/wbs_1.png"
              class="rounded-circle mb-3"
            />
            <h4>Daftar Akun WBS !</h4>
            <p class="card-text" align="justify">Sebelum dapat membuat pelaporan di Whistleblowing System Pemerintah Kabupaten Wonosobo, terlebih dahulu Anda harus melakukan pendaftaran untuk mendapatkan <b><i>Username</i></b> dan <b><i>Password</i></b> yang kemudian dapat Anda gunakan untuk Login kedalam Aplikasi WBS. Simpan dan Jaga baik-baik Akun tersebut agar tidak disalahgunakan oleh Pihak yang tidak bertanggung jawab.</p>
          </div>
          <div class="col-md-3 text-center">
            <img
              src="<?= base_url('assets/');?>img/wbs_2.png"
              class="rounded-circle mb-3"
            />
            <h4>Periksa Laporan Anda !</h4>
            <p class="card-text" align="justify">Sebelum Anda membuat pelaporan/aduan di Whistleblowing System Pemerintah Kabupaten Wonosobo, terlebih dahulu periksa kelengkapan pengaduan Anda apakah telah sesuai dengan <b>Kriteria Pengaduan</b> yang telah ditetapkan. Dikarenakan jika pelaporan yang Anda sampaikan tidak memenuhi kriteria, maka laporan akan <b>DITOLAK</b>.</p>
          </div>
          <div class="col-md-3 text-center">
            <img
              src="<?= base_url('assets/');?>img/wbs_3.png"
              class="rounded-circle mb-3"
            />
            <h4>Isi Form Pengaduan !</h4>
            <p class="card-text" align="justify">Klik menu <b>"Tulis Pengaduan"</b> yang terdapat di bagian navigasi dan lanjutkan dengan mengisi formulir pengaduan yang telah disediakan dan lanjutkan dengan menekan tombol <b>"Kirim Pengaduan"</b>.</p>
          </div>
          <div class="col-md-3 text-center">
            <img
              src="<?= base_url('assets/');?>img/wbs_4.png"
              class="rounded-circle mb-3"
            />
            <h4>Pantau Pengaduan Anda !</h4>
            <p class="card-text" align="justify">Anda dapat memantau pengaduan yang pernah dikirim dan membuat pengaduan baru dengan cara Login kembali ke dalam Aplikasi WBS dengan <b><i>Username</i></b> dan <b><i>Password</i></b> yang telah Anda punyai.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Partner Kami -->
    <div class="container-fluid client pt-1 pb-5 bg-light">
      <div class="container text-center">
        <h2 class="display-3" id="partner"></h2>
        <h2 class="display-3 pt-5">Partner Kami</h2>
        <div class="row pt-4 gx-4 gy-4">
          <div class="col">
            <a href="https://www.kpk.go.id/id/" target="_blank"><img src="<?= base_url('assets/');?>img/kpk.png"/></a>
          </div>
          <div class="col">
            <a href="https://jateng.bpk.go.id/" target="_blank"><img src="<?= base_url('assets/');?>img/bpk.png"/></a>
          </div>
          <div class="col">
            <a href="http://www.bpkp.go.id/jateng.bpkp" target="_blank"><img src="<?= base_url('assets/');?>img/bpkp.png"/></a>
          </div>
          <div class="col">
            <a href="https://inspektorat.jatengprov.go.id/17/" target="_blank"><img src="<?= base_url('assets/');?>img/pemprov_jateng.png"/></a>
          </div>
          <div class="col">
            <a href="http://jateng.polri.go.id/" target="_blank"><img src="<?= base_url('assets/');?>img/polda_jateng.png"/></a>
          </div>
          <div class="col">
            <a href="https://kejari-wonosobo.kejaksaan.go.id/" target="_blank"><img src="<?= base_url('assets/');?>img/kejaksaan.png"/></a>
          </div>
          <div class="col">
            <a href="https://www.kodam4.mil.id/" target="_blank"><img src="<?= base_url('assets/');?>img/kodam_VI.png"/></a>
          </div>
          <div class="col">
            <a href="http://pn-wonosobo.go.id/" target="_blank"><img src="<?= base_url('assets/');?>img/pengadilanwsb.png"/></a>
          </div>
        </div>
      </div>
    </div>
    <!-- kontak -->
    <div class="container-fluid pt-5 pb-3 kontak">
      <div class="container">
        <h2 class="display-3 text-center" id="kontak">Kontak Kami</h2><br><br>
        <img src="<?= base_url('assets/');?>img/Lambang Wonosobo.png" class="card crop images bg-transparent mx-auto" width="80" height="80"/>
        <h4 class="display-6 text-center">Whistleblowing System (WBS) Internal<br>Pemerintah Kabupaten Wonosobo</h4><br>
        <p class="text-center">
          Kantor Inspektorat Kabupaten Wonosobo - Jl. Tumenggung Jogonegoro No. 35 Wonosobo, Jawa Tengah (56314)<br>Telp./Fax. (0286)321039 &nbsp;|&nbsp; email : inspektoratkabwonosobo@yahoo.co.id &nbsp;|&nbsp; IG : @inspektorat_wsb &nbsp;|&nbsp; Twitter : @Inspektorat_Wsb
        </p>
        <div class="row pb-3">
        </div>
        <div class="col-md-3 mx-auto text-center">
            <a href="<?= base_url('auth/login/'); ?>" class="btn btn-danger btn-sm">Tulis Aduan</a><br><br>
            <a href="#"><span class="icon"><i class="fas fa-home"> Home</i></a>
        </div>
      </div>
    </div>
    <div class="container-fluid client pt-2 pb-2 bg-danger">
      <div class="container text-center">
      <span class="small float-center" style="font-size: 11px;"><b>Hak Cipta &copy; 2021 Pemerintah Kabupaten Wonosobo | All Rights Reserved</b></span>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
