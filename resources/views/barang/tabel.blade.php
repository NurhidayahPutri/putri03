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
      <h3>STOK BARANG</h3>
      <div class = "float-right">
      <a href="{{url('/tambahbarang')}}" class="btn btn-primary btn-sm">Tambah</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">KODE</th>
            <th scope="col">NAMA</th>
            <th scope="col">SATUAN</th>
            <th scope="col">HARGA AKHIR</th>
            <th scope="col">AKSI</th>
          </tr>
        </thead>
        <tbody>
          @foreach($vbarang as $brg)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <th scope="row">{{$brg->kode}}</th>
            <th scope="row">{{$brg->nama}}</th>
            <th scope="row">{{$brg->namasatuan}}</th>
            <td>{{ number_format($brg->hbt,2) }}</td>
            <th scope="row">
            <a href="{{ url('/editbarang',$brg->id) }}" class="btn btn-info btn-sm">Edit</a>
            <a href="{{url('/deletebarang', $brg->id)}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm">Delete</a>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>

@endsection

