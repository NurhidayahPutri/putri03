@extends('template')

@section('content')
<h3 >FORM PEMASOKAN</h3>
    <div class="container">

        <div class="col-lg-6">
            <form method="POST" action="{{url('/updatepemasok', $vedit->id)}}">
            @csrf
            <div class="form-group">
                <label >Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" value="{{$vedit->nama}}">
                <div class="text-danger">@error('nama'){{$message}}@enderror</div>
            <div class="form-group">
                <label >Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat" value="{{$vedit->alamat}}">
                <div class="text-danger">@error('alamat'){{$message}}@enderror</div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
