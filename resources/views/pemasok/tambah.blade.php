@extends('template')

@section('content')
<h3 >FORM PEMASOKA</h3>
    <div class="container">

        <div class="col-lg-6">
            <form method="POST" action="{{url('/simpanpemasok')}}">
            @csrf
            <div class="form-group">
                <label >Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
                <div class="text-danger">@error('nama'){{$message}}@enderror</div>
            <div class="form-group">
                <label >Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat">
                <div class="text-danger">@error('alamat'){{$message}}@enderror</div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
