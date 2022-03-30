@extends('template')

@section('content')
@if(session('pesan'))
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{session('pesan')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </div>
  @endif
  <div class="container">
      <h3>STOK BELI</h3>
      <div class = "float-right">
      <a href="{{url('/tambahbeli')}}" class="btn btn-primary btn-sm">Tambah</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">NOBUKTI</th>
            <th scope="col">PEMASOK</th>
            <th scope="col">TANGGAL</th>
            <th scope="col">DISCON</th>
            <th scope="col">KETERANGAN</th>
            <th scope="col">TOTAL</th>
            <th scope="col">AKSI</th>
          </tr>
        </thead>
        <tbody>
          @foreach($vbeli as $bl)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <th scope="row">{{$bl->nobukti}}</th>
            <th scope="row">{{$bl->nama}}</th>
            <th scope="row">{{$bl->tanggal}}</th>
            <th scope="row">{{$bl->disc}}</th>
            <th scope="row">{{$bl->ket}}</th>
            @foreach ($vmutasi as $mt)
                        @if($bl->nobukti == $mt->nb)
                        <th>Rp.{{ number_format($mt->total,2) }}</th>
                        @endif
                        @endforeach
            <th scope="row">
            <a href="{{ url('/editbeli',$bl->id) }}" class="btn btn-info btn-sm">Edit</a>
            <a href="{{url('/deletebeli', $bl->id)}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm">Delete</a>
            <a href="{{ url('/printbeli',$bl->nobukti) }}" class="btn btn-primary btn-sm">Print</a>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>

@endsection

