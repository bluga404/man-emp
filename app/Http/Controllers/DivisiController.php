<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DivisiController extends Controller
{
    public function index(){
        $divisi = Divisi::all();
        return view('divisi.index', compact('divisi'));
    }

    public function show(String $id)
    {
        $divisi = Divisi::find($id);
        return view('divisi.show', compact('divisi'));
    }

    public function edit(String $id)
    {
        $divisi = Divisi::find($id);
        return view('divisi.edit', compact('divisi'));
    }

    public function update(Request $request, Divisi $divisi)
    {
        $request->validate([
            'nama_divisi'  => 'required',
        ], [
            'nama_divisi.required'  => 'Nama pegawai harus diisi.',
        ]);

        $divisi -> update($request->all());

        Alert::success('Berhasil', 'Data berhasil diperbarui.');

        return redirect()->route('divisi.index');
    }

    public function destroy(String $id)
    {
         $divisi = Divisi::find($id);
         $divisi->delete();

         Alert::success('Berhasil', 'Data berhasil dihapus.');

         return redirect()
            ->route('divisi.index')
            ->with('success', 'Data divisi berhasil dihapus');
    }
}
