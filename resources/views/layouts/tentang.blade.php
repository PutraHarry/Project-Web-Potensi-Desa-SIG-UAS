<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Potensi Desa Tegal Harum</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin=""></script>
      
  <!-- jQuery -->
  <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/adminlte/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/adminlte/dist/js/demo.js"></script>


</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Potensi Desa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/dist/img/photo4.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->guard()->user()->nama}}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Potensi Desa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/sekolah" class="nav-link">
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pasar" class="nav-link">
                  <i class="fa fa-comments-dollar nav-icon"></i>
                  <p>Pasar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tempat-ibadah" class="nav-link">
                  <i class="fa fa-place-of-worship nav-icon"></i>
                  <p>Tempat Ibadah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tempat-belanja" class="nav-link">
                  <i class="fa fa-store nav-icon"></i>
                  <p>Tempat Perbelanjaan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/tentang" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Tentang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-arrow-left"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tentang Project</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">SIG Potensi Desa Tegal Harum</h3>
              <div class="col-12">
                <img src="/adminlte/dist/img/profil.png" class="image" alt="Developer">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">SIG Potensi Desa Tegal Harum</h3>
              <p>Sistem Informasi Geografis Potensi Desa Tegal Harum</p>
              <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="project-tab" role="tablist">
                        <a class="nav-item nav-link active" id="project-desc-tab" data-toggle="tab" href="#project-desc" role="tab" aria-controls="project-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="dev-tab" data-toggle="tab" href="#dev-desc" role="tab" aria-controls="dev-desc" aria-selected="false">Developer</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="project-desc" role="tabpanel" aria-labelledby="project-desc-tab"> Project ini adalah sistem informasi geografis untuk pemetaan potensi desa di lingkungan desa Tegal Harum, Kecamatan Denpasar Barat, Kota Denpasar Bali.
                        Sistem ini dapat memetakan potensi-potensi yang ada di desa Tegal Harum. Admin dapat membuat marker baru, melakukan edit marker dan menghapus marker sesuai dengan marker potensi yang diinginkan. Sesuai dengan yang disebutkan sebelumnya, admin merupakan pengguna dari sistem ini dapat melakukan login untuk menggunakan fitur lengkap dari sistem. 
                        Apabila tidak login pengguna (guset) hanya dapat melihat pemetaan potensi desa yang terdapat di desa Tegal Harum.
                        Potensi desa yang terdapat pada desa Tegal Harum adalah sebagai berikut:<br>1. Sekolah<br>2. Pasar<br>3. Tempat Ibadah<br>4. Tempat Perbelanjaan<br> </div>
                    <div class="tab-pane fade" id="dev-desc" role="tabpanel" aria-labelledby="dev-tab"> Project ini dikembangkan oleh: <br>Nama: I Gde Putu Harry Putra Pratama<br>NIM: 1805551047<br>Prodi: Teknologi Informasi<br>Fakultas: Fakultas Teknik<br>Universitas: Universitas Udayana<br>
                    <br>Pengembangan sistem bertujuan untuk memenuhi penilaian Ujian Akhir Semester untuk mata kuliah Sistem Informasi Geografis serta untuk menambah ilmu dan wawasan untuk pengembangan sistem berbasis web.  </div>
                </div>
            </div>
        </div>
            </div>
          </div>
         
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
