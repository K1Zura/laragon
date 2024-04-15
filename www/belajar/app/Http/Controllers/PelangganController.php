<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(){
        $pelanggan = pelanggan::get();
        return view('pelanggan', compact('pelanggan'));
    }

    public function tambah(Request $request){
        $pelanggan = pelanggan::create($request->all());
        $date = date('Y-m-d');
        history::create([
            'kegiatan' => 'Tambah Pelanggan',
            'tanggal' => $date,
        ]);
        return redirect()->back()->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function update(Request $request, $id){
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
        $date = date('Y-m-d');
        history::create([
            'kegiatan' => 'Update Pelanggan',
            'tanggal' => $date,
        ]);
        return redirect()->back()->with('success', 'Pelanggan berhasil diupdate');
    }

    public function hapus($id){
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->delete();
        $date = date('Y-m-d');
        history::create([
            'kegiatan' => 'Hapus Pelanggan',
            'tanggal' => $date,
        ]);
        return redirect()->back()->with('success', 'Pelanggan berhasil dihapus');
    }
}
