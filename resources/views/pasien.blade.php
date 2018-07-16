@extends('layouts.master')

@section('title', 'Pasien')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="home">Home</a>
    </li>
    <li class="breadcrumb-item active">Pasien</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Data Pasien</div>
    <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Kunjungan</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>

              @if(Auth::user()->kategori!=2)
                <th>Biaya</th>
              @endif

              @if(Auth::user()->kategori!=1)
                <th>Diagnosa</th>
              @endif

              <th> </th>
            </tr>
          </thead>
          <tbody>
            @foreach($list as $list)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ date('d-m-Y', strtotime($list->tanggal_kunjungan)) }}</td>
                <td>{{ $list->nama }}</td>
                <td>{{ $list->jenis_kelamin }}</td>

                @if(Auth::user()->kategori!=2)
                  <td>{{ $list->biaya }}</td>
                @endif

                @if(Auth::user()->kategori!=1)
                  <td>{{ $list->diagnosa }}</td>
                @endif

                <td><a href='pasien/{{$list->id_pasien}}'>Lihat</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @if(Auth::user()->kategori!=2)
        <a class="btn btn-primary" href="pasien/create" id="toggleNavColor">Pasien Baru</a>
      @endif
    </div>
  </div>
@endsection
