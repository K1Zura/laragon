<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\kelas;
use App\Models\siswa;
use App\Models\pembayaran;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if ($request->ajax()) {
                $data = pembayaran::select('pembayarans.*', 'kelas.nama_kelas','tahun_ajarans.tahun_ajaran')
                ->leftJoin('kelas', 'pembayarans.class_id', '=', 'kelas.id')
                ->leftJoin('tahun_ajarans', 'pembayarans.tahun_ajaran_id', '=', 'tahun_ajarans.id')
                ->latest()
                ->distinct()
                ->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPembayaran"><i class="las la-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePembayaran"><i class="las la-times"></i></a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                }
            }return view('data-master/data-pembayaran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        pembayaran::updateOrCreate([
            'id' => $request->pembayaran_id
        ],
        [
            'kategori' => $request->kategori,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'class_id' => $request->class_id,
            'nominal' => $request->nominal,
        ]);

        return response()->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembayaran = pembayaran::findOrFail($id);
        return response()->json($pembayaran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pembayaran::findOrFail($id)->delete();

        return response()->json();
    }

    public function tahun_ajaran(){
        $tahunAjaran = tahunAjaran::pluck('tahun_ajaran', 'id');
        return response()->json($tahunAjaran);
    }

    public function kelasPembayaran(){
        $kelas = kelas::pluck('nama_kelas', 'id');
        return response()->json($kelas);
    }

    public function toggleKondisi(Request $request)
    {
        $id = $request->get('id');
        $siswa = siswa::find($id);

        if ($siswa) {
            // Toggle the boolean value
            $siswa->validasi = !$siswa->validasi;
            $siswa->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
