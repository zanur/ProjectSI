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
        <form action="/pasien/create-proses-1/" method="post">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
              <td>Nama</td>
              <td>{{$list['nama']}}</td>
              <input type="hidden" name="nama" value="{{$list['nama']}}">
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>
                @if($list['jenis_kelamin']=='L') Laki-Laki
                @else Perempuan
                @endif
              </td>
              <input type="hidden" name="jenis_kelamin" value="{{$list['jenis_kelamin']}}">
            </tr>
            <tr>
              <td>Tanggal Lahir</td>
              <td>{{$list['tanggal_lahir']}}</td>
              <input class="form-control" name="tanggal_lahir" type="hidden" aria-describedby="nameHelp" value="{{$list['tanggal_lahir']}}">
            </tr>
            <tr>
              <td>Diagnosa</td>
              <td><input class="form-control" name="diagnosa" type="text" aria-describedby="nameHelp" required="true"></td>
            </tr>
            <tr>
              <td>Obat</td>
              <td>
                <textarea class="form-control" name="obat" required="true"></textarea>
              </td>
            </tr>
            </tr>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="dokter" value="{{Auth::user()->id}}">
              <input type="hidden" name="pengirim" value="{{$list['pengirim']}}">
              <input type="hidden" name="id" value="{{$id}}">
              <input type="hidden" name="kode" value="2">
              <td><input class="btn btn-primary btn-block" type="submit" name="submit" value="Kirim"></td>
          </table>
        </form>
      </div>
    </div>
  </div>
@endsection

