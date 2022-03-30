<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ControllerSatuan extends Controller
{
    public function satuan(){
        $vsatuan = Satuan::all();
       return view ('satuan.tabel', compact('vsatuan'));
    }

    public function tambah()
    {
        return view('satuan.tambah');
    }

    public function simpan(Request $request)
    {
        Satuan::create($request->all());
        return redirect('/satuan');
    }

    public function edit($id)
    {
        $vedit = Satuan::findOrFail($id);
        return view('satuan.edit', compact('vedit'));
    }

    public function update($id)
    {
        $vedit = Satuan::findOrFail($id);
        $vedit->namasatuan = Request()->namasatuan;
        $vedit->save();

        return redirect('/satuan');
    }

    public function delete($id)
    {
        $vsatuan = Satuan::findOrFail($id);
        $vsatuan->delete();

        return redirect('/satuan');
    }
}