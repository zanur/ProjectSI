@extends('layouts.master')

@section('title', 'Kunjungan')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/home">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="/pasien">Pasien</a>
    </li>
    <li class="breadcrumb-item active">Kunjungan</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-body">
      <h2>Kunjungan Tanggal {{date('d-m-Y', strtotime($pasien->tanggal_kunjungan))}}</h2>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <td>Nama</td>
            <td>{{$pasien->nama}}</td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>
              @if($pasien->jenis_kelamin=='L') Laki-Laki
              @else Perempuan
              @endif
            </td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>{{date('d-m-Y', strtotime($pasien->tanggal_kunjungan))}}</td>
          </tr>
          <tr>
            <td>Diagnosa</td>
            <td>{{$pasien->diagnosa}}</td>
          </tr>
          <tr>
            <td>Obat</td>
            <td>{{$pasien->obat}}</td>
          </tr>
          <tr>
            <td>Biaya</td>
            <td>{{$pasien->biaya}}</td>
          </tr>
          <tr>
            <td>Dokter</td>
            <td>{{$pasien->user->name}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection
