@extends('template')

@section('content')
<h3 >FORM EDIT SATUAN</h3>
    <div class="container">

        <div class="col-lg-6">
            <form method="POST" action="{{url('/updatesatuan', $vedit->id)}}">
            @csrf
            <div class="form-group">
                <label >Nama</label>
                <input type="text" class="form-control" name="namasatuan" placeholder="Masukan Nama" value="{{$vedit->namasatuan}}">
                <div class="text-danger">@error('namasatuan'){{$message}}@enderror</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
