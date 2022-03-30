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
      <h3>PEMASOK</h3>
      <div class = "float-right">
      <a href="{{url('/tambahpemasok')}}" class="btn btn-primary btn-sm">Tambah</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA</th>
            <th scope="col">ALAMAT</th>
            <th scope="col">AKSI</th>
          </tr>
        </thead>
        <tbody>
          @foreach($vpemasok as $pem)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <th scope="row">{{$pem->nama}}</th>
            <th scope="row">{{$pem->alamat}}</th>
            <th scope="row">
            <a href="{{ url('/editpemasok',$pem->id) }}" class="btn btn-info btn-sm">Edit</a>
            <a href="{{url('/deletepemasok', $pem->id)}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm">Delete</a>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>

@endsection

