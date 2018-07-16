@extends('layouts.master')

@section('title', 'Profile '.Auth::user()->name)

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/home">Home</a>
    </li>
    <li class="breadcrumb-item active">Profile</li>
  </ol>
  <!-- Example DataTables Card-->
  
  <div class="card mb-3">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <td>Nama</td>
            <td>{{Auth::user()->name}}</td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>
              @if(Auth::user()->jenis_kelamin=='L') Laki-Laki
              @else Perempuan
              @endif
            </td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{Auth::user()->email}}</td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>{{date('d-m-Y', strtotime(Auth::user()->tgl_lahir))}}</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>{{Auth::user()->alamat}}</td>
          </tr>
          <tr>
            <td>Kategori</td>
            <td>
              @if(Auth::user()->kategori==1) Karyawan
              @else Dokter
              @endif
            </td>
          </tr>
        </table>
        <a class="btn btn-primary" href="karyawan/create" id="toggleNavColor">Ubah Password</a>
        <a class="btn btn-primary" href="karyawan/create" id="toggleNavColor">Ubah Profile</a>
      </div>
    </div>
  </div>
@endsection
