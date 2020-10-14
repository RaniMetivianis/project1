<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product:: all();
        return response()->json([
            'message' => 'Menampilkan Semua Data Produk', 
            'data' => $product
        ], 200); 
    }

    public function show($id)   
    {
        $product = Product:: find($id);
        if($product){
            return response()->json([
                'message' => 'Produk Berhasil Ditemukan',
                'data' => $product 
            ], 200); 
        }else{
            return response()->json([
                'message' => 'Produk Tidak Ditemukan'
            ], 404); 
        }
    } 

    public function store(Request $request)
    {
        $product = Product::create([
            'name'=> $request->name, 
            'price'=> $request->price, 
            'rating'=> $request->rating, 
            'quantity'=> $request->quantity
        ]);
        if ($product) {
            return response()->json([
                'message' => 'Produk Berhasil Disimpan',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'message' => 'Produk Gagal Disimpan',
            ], 401);
        } 
    }

    public function destroy($id)
    {
        $product = Product:: find($id);
        if($product){
            $product->delete();
            return response()->json([
                'message' => 'Produk Berhasil Dihapus',
            ], 200); 
        }else{
            return response()->json([
                'message' => 'Produk Tidak Ditemukan'
            ], 404); 
        }
    } 

    public function update(Request $request, $id)
    {
        $product = Product::whereid($id)->update([
            'name'=> $request->name, 
            'price'=> $request->price, 
            'rating'=> $request->rating, 
            'quantity'=> $request->quantity
        ]); 
        if($product){
            return response()->json([
                'message' => 'Produk Berhasil Diupdate',
                'data' => $id
            ], 200); 
        }else{
            return response()->json([
                'message' => 'Produk Gagal Diupdate'
            ], 401); 
        }


    }
}

