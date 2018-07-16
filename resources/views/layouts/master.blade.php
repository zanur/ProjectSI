<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/home">
      <i class="fa fa-heartbeat"></i>
      Klinik Permata Bunda
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li {{ (Request::is('home') ? 'class=active' : 'class=nav-item') }} data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/home">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.html">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Charts</span>
          </a>
        </li> -->
        <li {{ (Request::is('pasien*') ? 'class=active' : 'class=nav-item') }} data-toggle="tooltip" data-placement="right" title="Pasien">
          <a class="nav-link" href="/pasien">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Pasien</span>
          </a>
        </li>

        @if(Auth::user()->kategori==0)
        <li {{ (Request::is('karyawan*') ? 'class=active' : 'class=nav-item') }} data-toggle="tooltip" data-placement="right" title="Karyawan">
          <a class="nav-link" href="/karyawan">
            <i class="fa fa-fw fa-address-card"></i>
            <span class="nav-link-text">Karyawan</span>
          </a>
        </li>
        @endif

        @if(Auth::user()->kategori==0)
        <li {{ (Request::is('pengeluaran*') ? 'class=active' : 'class=nav-item') }} data-toggle="tooltip" data-placement="right" title="Pengeluaran">
          <a class="nav-link" href="/pengeluaran">
            <i class="fa fa-fw fa-dollar"></i>
            <span class="nav-link-text">Pengeluaran</span>
          </a>
        </li>
        @endif

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Notifikasi
              @if(count(Auth::user()->unreadNotifications)>0)
                <span class="badge badge-pill badge-warning">{{count(Auth::user()->unreadNotifications)}}</span>
              @endif
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              @if(count(Auth::user()->unreadNotifications)>0)
                <span class="badge badge-pill badge-warning">{{count(Auth::user()->unreadNotifications)}}</span>
              @endif
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            @if(count(Auth::user()->unreadNotifications)>0)
              <h6 class="dropdown-header">Notifikasi Baru:</h6>

              @foreach(Auth::user()->unreadNotifications->sortBy('created_at')->take(5) as $notifikasi)
                <div class="dropdown-divider"></div>
                @if($notifikasi->data['kode']==1)
                  <a class="dropdown-item" href="/pasien/create-proses-1/{{$notifikasi->id}}">
                    <span class="text-success">Pasien Baru : {{$notifikasi->data['isi']['nama']}}</span>
                    <div class="dropdown-message small">{{date('H:i', strtotime($notifikasi->created_at))}}</div>
                  </a>
                @elseif($notifikasi->data['kode']==2)
                  <a class="dropdown-item" href="/pasien/create-proses-2/{{$notifikasi->id}}">
                    <span class="text-success">Pasien Baru : {{$notifikasi->data['isi']['nama']}}</span>
                    <div class="dropdown-message small">{{date('H:i', strtotime($notifikasi->created_at))}}</div>
                  </a>
                @endif
              @endforeach

              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="/tugas">Lihat semua</a>
            @else
              <h6 class="dropdown-header">Tidak ada notifikasi</h6>
            @endif
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if (Auth::user()->kategori == 2)
              <i class="fa fa-fw fa-user-md"></i>
            @else
              <i class="fa fa-fw fa-user"></i>
            @endif
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <div class="dropdown-header">
              <h5><strong>{{ Auth::user()->name }}</strong></h5>
              @if (Auth::user()->kategori == 1)
                {{ 'Karyawan' }}
              @elseif (Auth::user()->kategori == 2)
                {{ 'Dokter' }}
              @else
                {{'Atasan'}}
              @endif
            </div>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
        </li>

      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      @yield('konten')
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{asset('js/sb-admin-datatables.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-charts.min.js')}}"></script>
  </div>
</body>

</html>
