<?php

namespace App\Http\Controllers;

use App\Models\suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function tambahSuplier(){
        return view('/suplier.tambah-suplier');
    }
    public function tambah(Request $request){
        $suplier = suplier::create($request->all());
        return redirect('/suplier');
    }
    public function updateSuplier($id){
        $suplier = suplier::findOrFail($id);
        return view('/suplier.update-suplier', compact('suplier'));
    }
    public function update(Request $request, $id){
        $suplier = suplier::findOrFail($id);
        $suplier->update($request->all());
        return redirect('/suplier');
    }
    public function delete($id){
        $suplier = suplier::findOrFail($id);
        $suplier->delete();
        return redirect('/suplier');
    }
}
