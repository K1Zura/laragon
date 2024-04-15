<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\kejuruan;
use Illuminate\Http\Request;

class KejuruanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if ($request->ajax()) {
                $data = kejuruan::latest()->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editKejuruan"><i class="las la-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKejuruan"><i class="las la-times"></i></a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                }
            }return view('data-master/data-kejuruan');

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
        kejuruan::updateOrCreate([
            'id' => $request->kejuruan_id
        ],
        [
            'kejuruan' => $request->kejuruan,
        ]);

        return response()->json(['success'=>'Product saved successfully.']);
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
        $kejuruan = kejuruan::findOrFail($id);
        return response()->json($kejuruan);
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
        kejuruan::findOrFail($id)->delete();

        return response()->json(['success'=>'Product deleted successfully.']);
    }

    public function kejuruan(){
        $kejuruan = kejuruan::pluck('kejuruan', 'id');
        return response()->json($kejuruan);
    }
}
