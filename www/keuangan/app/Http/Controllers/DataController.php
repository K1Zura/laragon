<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data(){
        return view('data-master/data');
    }
    public function dataSiswa(){
        $siswa = siswa::get();
        return view('data-master/data-siswa', ['siswa'=>$siswa]);
    }
    public function addSiswa(request $request){
        $request->validate(
            [
                'nis'=>'required|unique:siswas',
                'nama'=>'required',
            ],
            [
                'nis.required'=>'NIS is required',
                'nis.unique'=>'NIS already exists',
                'nama.required'=>'Name is required',
            ]
        );
        $siswa = new siswa();
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->save();
    }
}
