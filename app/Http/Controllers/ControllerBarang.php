<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerBarang extends Controller
{
    public function barang()
    {
        $vbarang = DB::table('barang')
            ->leftjoin('satuan', 'satuan.id', '=', 'barang.idsatuan')
            ->select('barang.*', 'satuan.namasatuan' )
            ->get();
        return view('barang.tabel', compact('vbarang'));
    }

    public function tambah()
    {
        $vsatuan = Satuan::all();
        return view('barang.tambah', compact('vsatuan'));
    }

    public function simpan(Request $request)
    {
        Barang::create($request->all());
        return redirect('/barang');
    }

    public function edit($id)
    {
        $vedit = Barang::findOrFail($id);
        $vsatuan = Satuan::all();
        return view('barang.edit', compact('vedit', 'vsatuan'));
    }

    public function update($id)
    {
        $vedit = Barang::findOrFail($id);
        $vedit->nama = Request()->nama;
        $vedit->kode = Request()->kode;
        $vedit->idsatuan = Request()->idsatuan;
        $vedit->hbt = Request()->hbt;
        $vedit->save();

        return redirect('/barang');
    }

    public function delete($id)
    {
        $vbarang = Barang::findOrFail($id);
        $vbarang->delete();

        return redirect('/barang');
    }
}