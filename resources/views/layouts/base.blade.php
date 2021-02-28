<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Sistem Informasi Pengelolaan Pengajuan Domain (SIPPD)</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/brand/unand.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
    type="text/css">
  <!-- Page plugins -->

  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0" type="text/css') }}">
  {{-- DataTables CSS --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
       <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="/pengelola">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
            </li>

            
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-folder text-blue"></i>
                  <span>Permohonan Baru</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbar-default_dropdown_1">
                
                    <a class="dropdown-item" href="{{route('daftardomain')}}?status=0">
                      <div class="d-flex justify-content-between">
                          <span > Pengajuan</span>
                          <span class="badge badge-primary">{{($status_pengajuan ?? '')}} </span>
                      </div>
                    </a>
                    <a class="dropdown-item" href="{{route('daftardomain')}}?status=3">
                      <div class="d-flex justify-content-between">
                        <span> Diterima </span>
                        <span class="badge badge-success">{{($status_diterima ?? '')}} </span>
                      </div>
                    </a>
                    <a class="dropdown-item" href="{{route('daftardomain')}}?status=1">
                      <div class="d-flex justify-content-between">
                        <span> Ditolak </span>
                        <span class="badge badge-danger">{{($status_ditolak ?? '')}} </span>
                      </div>
                    </a>
                
                </ul>
            </li>
            
            

            <li class="nav-item">
            <a class="nav-link" href="{{route('lihatdomain')}}">
                <i class="fa fa-folder-open text-blue"></i>
                <span class="nav-link-text">Daftar Domain</span>
            </a>
            
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('referensi')}}">
                <i class="fa fa-info-circle text-blue"></i>
                <span class="nav-link-text">Referensi Nama Domain</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('profil')}}">
                <i class="fa fa-user-circle text-blue"></i>
                <span class="nav-link-text">Profil</span>
            </a>
            </li>
            
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          @include('include.navbar')
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    @yield('content')
    @yield('modal')
    </div>
          <!-- Footer -->
          <footer class="footer pt-0">
        @include('include.footer')
      </footer>
    </div>
  </div>

  <!-- Script -->
   <!--  -->
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
  {{-- DataTables JS --}}
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  @yield('scripts')
</body>

</html>