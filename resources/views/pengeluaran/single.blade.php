@extends('layouts.master')

@section('title', 'Detail Pengeluaran')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/home">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="/pengeluaran">Pengeluaran</a>
    </li>
    <li class="breadcrumb-item active">Detail Pengeluaran</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-body">
      <h2>Pengeluaran Tanggal {{date('d-m-Y', strtotime($list->tanggal_kunjungan))}}</h2>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <td>Total Pengeluaran</td>
            <td>{{$list->total_pengeluaran}}</td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>
              {{$list->keterangan}}
            </td>
          </tr>
          <tr>
            <td>Ditambahkan oleh</td>
            <td>{{$list->user->name}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection
