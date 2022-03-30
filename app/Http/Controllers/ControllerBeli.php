<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Beli;
use App\Models\Mutasi;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerBeli extends Controller
{
    public function beli()
    {
        $vbeli = DB::table('beli')
            ->leftjoin('pemasok', 'pemasok.id', '=', 'beli.idpem')
            ->select('beli.*', 'pemasok.nama')
            ->get();
        $vmutasi = DB::table('beli')
            ->leftJoin('mutasi', 'mutasi.nb', '=', 'beli.nobukti')
            ->select('nb', DB::raw('SUM(mutasi.harga*mutasi.qty) as total'))
            ->groupBy('nb')
            ->get();
        return view('beli.tabel', compact('vbeli', 'vmutasi'));
    }

    public function tambah()
    {
        $vpemasok = Pemasok::all();
        return view('beli.tambah', compact(('vpemasok')));
    }

    public function simpan(Request $request)
    {
        Beli::create($request->all());
        return redirect('/beli');
    }

    public function edit($id)
    {
        $vbarang = Barang::all();
        $vpemasok = Pemasok::all();
        $vedit = Beli::findOrFail($id);
        $vmutasi = DB::table('mutasi')
            ->leftjoin('barang', 'barang.id', '=', 'mutasi.idbarang')
            ->select('mutasi.*', 'barang.nama')
            ->where('mutasi.nb', '=', $vedit->nobukti)
            ->get();
        return view('beli.edit', compact('vedit', 'vpemasok', 'vbarang', 'vmutasi'));
    }

    public function mutasisimpan(Request $request)
    {

        Mutasi::create($request->all());
        return redirect()->back();
    }

    public function mutasihapus($id)
    {
        $vmutasi = Mutasi::findOrFail($id);
        $vmutasi->delete();

        return redirect()->back();
    }
    public function printbeli($nobukti)
    {
        $vprint = DB::table('mutasi')
            ->leftJoin('barang', 'barang.id', '=', 'mutasi.idbarang')
            ->select('mutasi.*', 'barang.nama')
            ->where('nb', $nobukti)
            ->get();
        $vbeli = Mutasi::where('nb', $nobukti)->first();
        return view('beli.print', compact('vprint', 'vbeli'));
    }

    public function hapus($id)
    {
        $vbeli = Beli::findOrFail($id);
        $vbeli->delete();

        return redirect()->back();
    }
}