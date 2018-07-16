@extends('layouts.master')

@section('title', 'Home')



@section('konten')
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Home</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">
                Tugas: <br>
                <h5><strong>{{count(Auth::user()->unreadNotifications)}}</strong></h5>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/tugas">
              <span class="float-left">Lihat Detail</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5">
                Pasien Hari ini: <br>
                <h5><strong>{{count($pasien)}}</strong></h5>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/pasien">
              <span class="float-left">Lihat Detail</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-dollar"></i>
              </div>
              <div class="mr-5">
                Pendapatan Hari ini: <br>
                <h5><strong>Rp {{$pasien->sum('biaya')}},-</strong></h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-dollar"></i>
              </div>
              <div class="mr-5">
                Pengeluaran Hari ini: <br>
                <h5><strong>Rp {{$pengeluaran->sum('total_pengeluaran')}},-</strong></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Jumlah Pasien</div>
        <div class="card-body">
          <div id="pop_div"></div>
          <?= $lava->render('AreaChart', 'Population', 'pop_div'); ?>
        </div>
      </div>

      <!-- Example Bar Chart Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bar-chart"></i> Pendapatan dan Pengeluaran per Bulan</div>
        <div class="card-body">
          <div id="perf_div"></div>
            <?= $lava->render('ColumnChart', 'Finances', 'perf_div') ?>
        </div>
      </div>
@endsection
