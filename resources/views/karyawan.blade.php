@extends('layouts.master')

@section('title', 'Karyawan')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/home">Home</a>
    </li>
    <li class="breadcrumb-item active">Karyawan</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Data Karyawan</div>
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
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Kategori</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($list as $list)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->jenis_kelamin }}</td>
                <td>{{ date('d-m-Y', strtotime($list->tgl_lahir)) }}</td>
                <td>{{ $list->email }}</td>
                <td>{{ $list->alamat }}</td>
                <td>
                  @if ($list->kategori == 1)
                    {{ 'Karyawan' }}
                  @elseif ($list->kategori == 2)
                    {{ 'Dokter' }}
                  @endif
                </td>
                <td><a class="btn btn-primary btn-block" href="/karyawan/{{$list->id}}/edit">Edit</a></td>
                <td>
                  <form action="/karyawan/{{$list->id}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="btn btn-danger btn-block" type="submit" name="delete" value="Hapus">
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <a class="btn btn-primary" href="karyawan/create" id="toggleNavColor">Tambah Karyawan</a>
    </div>
  </div>
@endsection
