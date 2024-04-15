<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\kelas;
use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(request()->ajax()){
            if ($request->ajax()) {
                $data = siswa::select('siswas.*', 'kelas.nama_kelas', 'kejuruans.kejuruan', 'tahun_ajarans.tahun_ajaran')
                ->leftJoin('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                ->leftJoin('kejuruans', 'siswas.kejuruan_id', '=', 'kejuruans.id')
                ->leftJoin('tahun_ajarans', 'siswas.tahun_ajaran_id', '=', 'tahun_ajarans.id')
                ->latest()
                ->distinct()
                ->get();
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editSiswa"><i class="las la-edit"></i></a>';
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteSiswa"><i class="las la-times"></i></a>';
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }

        }return view('data-master/data-siswa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        siswa::updateOrCreate([
            'id' => $request->product_id
        ],
        [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'kejuruan_id'=> $request->kejuruan_id,
            'tahun_ajaran_id'=> $request->tahun_ajaran_id,
        ]);

        return response()->json(['success'=>'Product saved successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $siswa = siswa::findOrFail($id);
        return response()->json($siswa);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        siswa::findOrFail($id)->delete();

        return response()->json(['success'=>'Product deleted successfully.']);
    }
    public function kelas(){
        $kelas = kelas::pluck('nama_kelas', 'id');
        return response()->json($kelas);
    }
}
