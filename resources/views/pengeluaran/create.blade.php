@extends('layouts.master')

@section('title', 'Tambah Pengeluaran')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/home">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="/karyawan">Pengeluaran</a>
    </li>
    <li class="breadcrumb-item active">Tambah Pengeluaran</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-body">
      <h2>Pengeluaran</h2>
      @if(count($errors) > 0)
        <div class="alert alert-warning">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="/pengeluaran" method="post">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <td>Tanggal Pengeluaran</td>
            <td><input class="form-control" name="tgl_pengeluaran" type="date" required="true" value="{{date('Y-m-d')}}"></td>
          </tr>
          <tr>
            <td>Total Pengeluaran</td>
            <td><input class="form-control" name="total_pengeluaran" type="number" required="true"></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><input class="form-control" name="keterangan" type="text" required="true"></td>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          </tr>

          <tr>
            <td><input class="btn btn-primary btn-block" type="submit" name="submit" value="Tambah"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
@endsection
