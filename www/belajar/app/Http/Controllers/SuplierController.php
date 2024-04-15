<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index(){
        $suplier = suplier::get();
        return view('suplier', compact('suplier'));
    }

    public function tambah(Request $request){
        $date = date('Y-m-d');
        $suplier = suplier::create($request->all());
        history::create([
            'kegiatan' => 'Tambah Suplier',
            'tanggal' => $date,
        ]);
        return redirect()->back()->with('success', 'Suplier berhasil ditambahkan.');
    }

    public function update(Request $request, $id){
        $date = date('Y-m-d');
        $suplier = suplier::findOrFail($id);
        $suplier->update($request->all());
        history::create([
            'kegiatan' => 'Update Suplier',
            'tanggal' => $date,
        ]);
        return redirect()->back()->with('success', 'Suplier berhasil diupdate.');
    }

    public function hapus($id){
        $date = date('Y-m-d');
        $suplier = suplier::findOrFail($id);
        $suplier->delete();
        history::create([
            'kegiatan' => 'Hapus Suplier',
            'tanggal' => $date,
        ]);
        return redirect()->back()->with('success', 'Suplier berhasil dihapus');
    }
}
