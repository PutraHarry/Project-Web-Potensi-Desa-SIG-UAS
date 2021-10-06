<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Pemetaan Potensi Desa Tegal Harum</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/adminlte/dist/js/adminlte.min.js"></script>

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/" class="navbar-brand">
        <img src="/adminlte/dist/img/bendera-RI.jpg" alt="desa tegal harum" class="brand-image elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SIG Desa Tegal Harum</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Potensi Desa</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/guest/sekolah" class="dropdown-item">Sekolah </a></li>
              <li><a href="/guest/tempat-ibadah" class="dropdown-item">Tempat Ibadah</a></li>
              <li><a href="/guest/tempat-belanja" class="dropdown-item">Tempat Perbelanjaan</a></li>
              <li><a href="/guest/pasar" class="dropdown-item">Pasar</a></li>
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item">
            <a href="/guest/tentang" class="nav-link">Tentang</a>
          </li>
        </ul>

        
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
   
        <li class="nav-item">
          <a class="nav-link" href="/login" ><i
              class="nav-icon fa fa-key text-warning"></i> Login</a> 
            </li>
          </ul>
        </div>
      </nav>
      <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> <small>|| Pemetaan Potensi Desa Tegal Harum ||  @yield('header')</small></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          @yield('guestfront')
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        1805551047
    </div>
    <strong>Copyright &copy; 2021 <a href>SIG Potensi Desa Tegal Harum</a>.</strong> Tegal Harum - Denpasar - Bali.
  </footer>
</div>
<!-- ./wrapper -->


</body>
</html>
