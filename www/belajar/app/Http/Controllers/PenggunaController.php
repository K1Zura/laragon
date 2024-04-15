<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\history;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(Request $request){
        if ($request->user()->role_id === 1) {
            $user = User::get();
            return view('pengguna', compact('user'));
        }elseif ($request->user()->role_id === 2) {
            return redirect()->back()->with('error', 'Hanya Admin Yang Diperbolehkan');
        }
    }

    public function tambah(Request $request){
        $date = date('Y-m-d');
        $user = User::create($request->all());
        history::create([
            'kegiatan' => 'Tambah Pengguna',
            'tanggal' => $date,
        ]);
        return redirect()->back()->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function update(Request $request, $id){
        $date = date('Y-m-d');
        $user = User::findOrFail($id);
        $user->update($request->all());
        history::create([
            'kegiatan' => 'Update Pengguna',
            'tanggal' => $date,
        ]);
        return redirect()->back()->with('success', 'Pengguna berhasil diupdate.');
    }

    public function hapus($id){
        $date = date('Y-m-d');
        $user = User::findOrFail($id);
        $user->delete();
        history::create([
            'kegiatan' => 'Hapus Pengguna',
            'tanggal' => $date,
        ]);
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
