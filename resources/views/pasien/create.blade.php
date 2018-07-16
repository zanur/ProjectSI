@extends('layouts.master')

@section('title', 'Tambah Pasien')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/home">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="/pasien">Pasien</a>
    </li>
    <li class="breadcrumb-item active">Pasien Baru</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-body">
      <h2>Pasien Baru</h2>
      <div class="table-responsive">
        <form action="/pasien/kirim" method="post">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
              <td>Nama</td>
              <td><input class="form-control" name="nama" type="text" aria-describedby="nameHelp" required="true"></td>
              @if ($errors->has('email'))
                  <label>cupu</label>
              @endif
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
                <input class="form-control" name="tanggal_lahir" type="Date" aria-describedby="nameHelp" value="1990-01-01" required="true">
                <label class="form-control-sm">mm/dd/yyyy</label>
              </td>
            </tr>
            <tr>
              <td>Dokter</td>
              <td>
                <select id="dokter" name="dokter" class="form-control" required="true">
                  <option disabled selected>-- Pilih Dokter --</option>
                  @foreach($list as $list)
                    <option value="{{$list->id}}">{{$list->name}}</option>
                  @endforeach
                </select>
              </td>
            </tr>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="pengirim" value="{{Auth::user()->id}}">
              <input type="hidden" name="kode" value="1">
              <td><input class="btn btn-primary btn-block" type="submit" name="submit" value="Kirim"></td>
          </table>
        </form>
      </div>
    </div>
  </div>
@endsection

