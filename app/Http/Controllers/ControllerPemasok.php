<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class ControllerPemasok extends Controller
{
    public function pemasok()
    {
        $vpemasok = Pemasok::all();
        return view('pemasok.tabel', compact('vpemasok'));
    }

    public function tambah()
    {
        return view('pemasok.tambah');
    }

    public function simpan(Request $request)
    {
        Pemasok::create($request->all());
        return redirect('/pemasok');
    }

    public function edit($id)
    {
        $vedit = Pemasok::findOrFail($id);
        return view('pemasok.edit', compact('vedit'));
    }

    public function update($id)
    {
        $vedit = Pemasok::findOrFail($id);
        $vedit->nama = Request()->nama;
        $vedit->alamat = Request()->alamat;
        $vedit->save();

        return redirect('/pemasok');
    }

    public function delete($id)
    {
        $vpemasok = pemasok::findOrFail($id);
        $vpemasok->delete();

        return redirect('/pemasok');
    }
}