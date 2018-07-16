@extends('layouts.master')

@section('title', 'Edit Karyawan')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/home">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="/karyawan">Karyawan</a>
    </li>
    <li class="breadcrumb-item active">Edit Karyawan</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-body">
      <h2>Edit Karyawan</h2>
      <form action="/karyawan/{{$karyawan->id}}" method="post">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <td>Nama</td>
            <td><input class="form-control" value="{{$karyawan->name}}" name="nama" type="text" required="true"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input class="form-control" value="{{$karyawan->email}}" name="email" type="email" required="true"></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>
              @if($karyawan->jenis_kelamin=='L')
                <input type="radio" name="jenis_kelamin" value="L" checked="true" required="true"> Laki-laki<br>
                <input type="radio" name="jenis_kelamin" value="P"> Perempuan
              @else
                <input type="radio" name="jenis_kelamin" value="L"> Laki-laki<br>
                <input type="radio" name="jenis_kelamin" value="P" checked="true" required="true"> Perempuan
              @endif
            </td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>
              <input class="form-control" value="{{$karyawan->tgl_lahir}}" name="tanggal_lahir" type="Date" required="true">
              <label class="form-control-sm">mm/dd/yyyy</label>
            </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><textarea class="form-control" name="alamat" required="true">{{$karyawan->alamat}}</textarea></td>
          </tr>
          <tr>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <td><input class="btn btn-primary btn-block" type="submit" name="submit" value="Ubah"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
@endsection
