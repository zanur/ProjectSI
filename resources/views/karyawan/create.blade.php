@extends('layouts.master')

@section('title', 'Tambah Karyawan')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/home">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="/karyawan">Karyawan</a>
    </li>
    <li class="breadcrumb-item active">Karyawan Baru</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-body">
      <h2>Karyawan Baru</h2>
      @if(count($errors) > 0)
        <div class="alert alert-warning">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="/karyawan" method="post">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <td>Nama</td>
            <td><input class="form-control" name="nama" type="text" required="true"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input class="form-control" name="email" type="email" required="true"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input class="form-control" name="password" type="password" required="true"></td>
          </tr>
          <tr>
            <td >Kategori</td>
            <td>
              <select name="kategori" class="form-control">
                <option value="1">karyawan</option>
                <option value="2">dokter</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>
              <input type="radio" name="jenis_kelamin" value="L" required="true"> Laki-laki<br>
              <input type="radio" name="jenis_kelamin" value="P"> Perempuan
            </td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>
              <input class="form-control" name="tanggal_lahir" type="Date" value="1990-01-01" required="true">
              <label class="form-control-sm">mm/dd/yyyy</label>
            </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><textarea class="form-control" name="alamat" required="true"></textarea></td>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </tr>
          <tr>
            <td><input class="btn btn-primary btn-block" type="submit" name="submit" value="Tambah"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
@endsection
