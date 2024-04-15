<?php

namespace App\Http\Controllers\api;

use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SiswaResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SiswaDetailResource;

class SiswaController extends Controller
{
    public function index(){
        $siswa = siswa::all();
        // return response()->json($siswa);
        return SiswaDetailResource::collection($siswa->loadMissing('kelas:id,nama_kelas', 'tahunAjaran:id,tahun_ajaran'));
    }
    public function show($id)
    {
        $siswa = siswa::with('kelas:id,nama_kelas', 'tahunAjaran:id,tahun_ajaran')->findOrFail($id);
        return new SiswaDetailResource($siswa);

    }
    // with harus di atas, loadMissing dibawah
    public function show2($id)
    {
        $siswa = siswa::findOrFail($id);
        return new SiswaDetailResource($siswa);

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:siswas|max:5',
            'nama' => 'required',
        ]);
        // $request['user'] = Auth::user()->id;
        $image = null;
        if ($request->File) {
            $fileName = $this->generateRandomString();
            $extension = $request->File->extension();
            $image = $fileName.'.'.$extension;

            Storage::putFileAs('image', $request->File, $fileName.'.'.$extension);
        }
        $request['image'] = $image;
        $siswa = siswa::create($request->all());
        return new SiswaDetailResource($siswa->loadMissing('kelas:id,nama_kelas'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'nis' => 'required|max:5',
            'nama' => 'required',
        ]);
        $siswa = siswa::findOrFail($id);
        $siswa->update($request->all());

        return new SiswaDetailResource($siswa->loadMissing('kelas:id,nama_kelas', 'tahunAjaran:id,tahun_ajaran'));
    }
    public function destroy($id){
        $siswa = siswa::findOrFail($id);
        $siswa->delete();

        return new SiswaDetailResource($siswa->loadMissing('kelas:id,nama_kelas', 'tahunAjaran:id,tahun_ajaran'));
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
