@extends('template')

@section('content')
<h3 >FORM SATUAN</h3>
    <div class="container">

        <div class="col-lg-6">
            <form method="POST" action="{{url('/simpansatuan')}}">
            @csrf
            <div class="form-group">
                <label >Nama</label>
                <input type="text" class="form-control" name="namasatuan" placeholder="Masukan Nama">
                <div class="text-danger">@error('namasatuan'){{$message}}@enderror</div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
