@extends('template')

@section('content')
<h3 >FORM EDIT BARANG</h3>
    <div class="container">

        <div class="col-lg-6">
            <form method="POST" action="{{url('/updatebarang', $vedit->id)}}">
            @csrf
            <div class="form-group">
                <label >Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" value="{{$vedit->nama}}">
                <div class="text-danger">@error('nama'){{$message}}@enderror</div>
            </div>
            <div class="form-group">
                <label >Kode</label>
                <input type="text" class="form-control" name="kode" placeholder="Masukan Kode" value="{{$vedit->kode}}">
                <div class="text-danger">@error('kode'){{$message}}@enderror</div>
            </div>
            <div class="form-group">
                <label>Satuan</label>
            <div>
                <select class = "form-control" name="idsatuan" >
                    @foreach ($vsatuan as $satu)
                         <option value="{{$satu->id}}">{{$satu->namasatuan}}</option>
                    @endforeach
                </select> </div>
            </div>
            <div class="form-group">
                <label>Harga Terakhir</label>
                <input type="number" class="form-control" name="hbt"  placeholder="Masukan Harga" value="{{$vedit->hbt}}">
                <div class="text-danger">@error('hbt'){{$message}}@enderror</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
