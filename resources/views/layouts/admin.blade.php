<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  @yield('css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
  {{-- section navbar atas --}}
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <!-- menu navbar besar-kecil -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
    </ul>

    <!-- Right navbar links -->
    <!-- icon full-screen dan logout -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}" onsubmit="return confirm('Apakah yakin ingin keluar??')">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
    
  </nav>

  {{--section navbar samping--}}
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
      <div class="user-panel pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user.jpeg')}}" class="img-circle elevation-2" alt="User Image">
        </div>

        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->nama_petugas }}</a>
        </div>
      </div>
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dasboard.index')}}" class="nav-link  {{Request::is('admin/dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Dashboard
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('pengaduan.index')}}" class="nav-link {{Request::is('admin/pengaduan') ? 'active' : ''}}">
            <i class="nav-icon fas fa-bullhorn"></i>              
              <p>
                Pengaduan 
                <i class="right fas fa-angle-right"></i>

              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('masyarakat.index')}}" class="nav-link {{Request::is('admin/masyarakat') ? 'active' : ''}}">
            <i class="nav-icon fas fa-users"></i>              
              <p>
                Masyarakat 
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
          </li>
            @if(Auth::guard('admin')->user()->level=='admin')
          <li class="nav-item ">
            <a href="{{route('petugas.index')}}" class="nav-link {{Request::is('admin/petugas') ? 'active' : ''}}">
            <i class="nav-icon fas fa-user-edit"></i>              
              <p>
                Petugas 
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('laporan.index')}}" class="nav-link {{Request::is('admin/laporan') ? 'active' : ''}}">
            <i class="nav-icon fas fa-file-alt"></i>              
              <p>
                Laporan 
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  {{--section isi--}}
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('header')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dasboard.index')}}">{{ Auth::guard('admin')->user()->nama_petugas }}</a></li>
              @yield('header2')
              <li class="breadcrumb-item active">@yield('header')</li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        @yield('content')
    
  </div>
  
  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2021 <a href="#">@rfni_p</a>.</strong>
  </footer>

</div>





  <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
{{-- <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script> --}}
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>

@yield('js')


</body>
</html>
