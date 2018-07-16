@extends('layouts.master')

@section('title', 'Pengeluaran')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="home">Home</a>
    </li>
    <li class="breadcrumb-item active">Pengeluaran</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Pengeluaran</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Pengeluaran</th>
              <th>Total Pengeluaran</th>
              <th>Keterangan</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($list as $list)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ date('d-m-Y', strtotime($list->tgl_pengeluaran)) }}</td>
                <td>{{ $list->total_pengeluaran }}</td>
                <td>{{ $list->keterangan }}</td>
                <td><a href='pengeluaran/{{$list->id_pengeluaran}}'>Lihat</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <a class="btn btn-primary" href="pengeluaran/create" id="toggleNavColor">Tambah Pengeluaran</a>
    </div>
  </div>
@endsection
