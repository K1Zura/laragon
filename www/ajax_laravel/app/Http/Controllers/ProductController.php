<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        $product = product::latest()->paginate(5);
        return view('/product', ['product'=>$product]);
    }

    //add product
    public function addProduct(request $request){
        $request->validate(
            [
            'name'=>'required|unique:products',
            'price'=>'required',
            ],
            [
                'name.required'=>'Name is required',
                'name.unique'=>'Name alredy exist',
                'price.required'=>'Price is required',
            ]
    );
        $product = product::create($request->all());
        return response()->json([
            'status' => 'success',
        ]);
    }

    //update product
    public function updateProduct(request $request){
        $request->validate(
            [
            'up_name'=>'required|unique:products,name,'.$request->up_id,
            'up_price'=>'required',
            ],
            [
                'name.required'=>'Name is required',
                'price.unique'=>'Product alredy exist',
                'price.required'=>'Price is required',
            ]
    );
        product::where('id', $request->up_id)->update([
            'name'=>$request->up_name,
            'price'=>$request->up_price,
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function deleteProduct(request $request){
        Product::find($request->product_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function pagination(request $request){
        $product = product::latest()->paginate(5);
        return view('/pagination_product', ['product'=>$product])->render();
    }

    //search product
    public function searchProduct(request $request){
        $product = product::where('name', 'like', '%'.$request->search_string.'%')
        ->orWhere('price', 'like', '%'.$request->search_string.'%')
        ->orderBy('id','desc')
        ->paginate(5);

        if ($product->count() >= 1) {
            return view('/pagination_product', ['product'=>$product])->render();
        }else {
            return response()->json([
                'status'=>'nothing_found'
            ]);
        }
    }
}
