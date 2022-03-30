@extends('template')

@section('content')
<div class="container">
    <div class="card">

            <h6 class="card-title">FORM EDIT PEMBELIAN</h6>

        <div class="card-body">
            <div class="container">
                <form action="{{ url('updatebeli') }}" method="POST" enctype="multipart/form-data">
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
                                                    placeholder="Masukan No Bukti" value="{{$vedit->nobukti}}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                                    placeholder="Masukan Tanggal" value="{{$vedit->tanggal}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pemasok</label>
                                        <select class="form-control" name="idpem" id="idpem">
                                            @foreach($vpemasok as $pem)
                                            <option value="{{ $pem->id }}"
                                                {{$pem->id == $vedit->idpem?'selected':''}}>{{$pem->nama}}</option>
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
                                            placeholder="Masukan Discount" value="{{$vedit->disc}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <input type="text" class="form-control" name="ket"
                                                    placeholder="Masukan Keterangan" value="{{$vedit->ket}}">
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


    <div class="card">

            <h6 class="card-title">FORM TAMBAH DETAIL</h6>

        <div class="card-body">
            <div class="container">
                <form action="{{ url('mutasisimpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select class="form-control" name="idbarang" id="idbarang">
                                    <option value="" holder>Masukan Barang</option>
                                    @foreach ( $vbarang as $brg )
                                    <option value="{{ $brg->id }}">{{ $brg->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <input type="hidden" class="form-control" name="nb" id="nb"
                                    placeholder="Masukan No Bukti" value="{{$vedit->nobukti}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" name="qty" id="qty" placeholder="Jumlah"
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga"
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Proses</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card">

            <h6 class="card-title">MUTASI</h6>

        <div class="card-body">
            <div class="container">
                <table class="table table-bordered  table-sm">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>No Bukti</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        @php
                        $subtotal = 0;
                        @endphp
                        @foreach ( $vmutasi as $mt)
                        @php
                        $total = $mt->qty * $mt->harga;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mt->nb }}</td>
                            <td>{{ $mt->nama }}</td>
                            <td>{{ $mt->qty }}</td>
                            <td>Rp.{{ number_format($mt->harga,2) }}</td>
                            <td>Rp.{{ number_format($mt->qty * $mt->harga,2)}}</td>
                            <td>
                                <a href="{{ url('/mutasihapus',$mt->id) }}" class="btn btn-primary btn-sm">Hapus</a>

                            </td>

                        </tr>
                        @php
                        $subtotal += $total;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="5"> Total : </td>
                            <td>Rp.{{ number_format($subtotal,2)}}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{url('/beli')}}" class="btn btn-default btn-sm">Kembali</a>
            </div>
        </div>
    </div>
</div>
    @endsection
