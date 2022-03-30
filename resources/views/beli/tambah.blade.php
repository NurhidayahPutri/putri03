@extends('template')

@section('content')
<div class="container">
    <div class="card">

            <h6 class="card-title">FORM TAMBAH PEMBELIAN</h6>

        <div class="card-body">
            <div class="container">
                <form action="{{ url('simpanbeli') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No Bukti</label>
                                                <input type="text" class="form-control" name="nobukti" id="nobukti"
                                                    placeholder="Masukan No Bukti" value="{{ 'NP'.date('dmyHis')}}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                                    placeholder="Masukan Tanggal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pemasok</label>
                                        <select class="form-control" name="idpem" id="idpem">
                                            @foreach($vpemasok as $pem)
                                            <option value="{{ $pem->id }}" @if($pem->id == $pem->idpem)
                                                selected
                                                @endif
                                                >{{ $pem->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="text" class="form-control" name="disc" id="disc"
                                            placeholder="Masukan Discount">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <input type="text" class="form-control" name="ket"
                                                    placeholder="Masukan Keterangan">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Proses</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm" name="Simpanbel">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @endsection
