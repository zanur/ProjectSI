@extends('layouts.master')

@section('title', 'Tugas')

@section('konten')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="home">Home</a>
    </li>
    <li class="breadcrumb-item active">Tugas</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    @if(count(Auth::user()->unreadNotifications)>0)
      <div class="card-header">
        @if(Auth::user()->kategori==1)
          <i class="fa fa-list"></i>Antrian Pembayaran Pasien</div>
        @elseif((Auth::user()->kategori==2))
          <i class="fa fa-list"></i>Antrian Pasien</div>
        @else
          <i class="fa fa-list"></i>Tugas</div>
        @endif
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
              </tr>
            </thead>
            <tbody>
              @foreach(Auth::user()->unreadNotifications->sortBy('created_at') as $list)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{ $list->created_at }}</td>
                  @if($list->data['kode']==1)
                    <td>
                      <a href="/pasien/create-proses-1/{{$list->id}}">{{ $list->data['isi']['nama'] }}</a>
                    </td>
                  @elseif($list->data['kode']==2)
                    <td>
                      <a href="/pasien/create-proses-2/{{$list->id}}">{{ $list->data['isi']['nama'] }}</a>
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      @else
        <div class="card-body">
          <h2>Tidak ada pasien</h2>
        </div>
      @endif
    </div>
  </div>
@endsection
