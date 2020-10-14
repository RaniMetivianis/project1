<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product:: all();
        return response()->json([
            'message' => 'Menampilkan Semua Data Produk', 
            'data' => $products
        ], 200); 
    }

    public function show($id)
    {
        $products = Product:: find($id);
        if($products){
            return response()->json([
                'message' => 'Produk Berhasil Ditemukan',
                'data' => $products 
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
        $products = Product:: find($id);
        if($products){
            $products->delete();
            return response()->json([
                'message' => 'Produk Berhasil Dihapus',
            ], 200); 
        }else{
            return response()->json([
                'message' => 'Produk Tidak Ditemukan'
            ], 404); 
        }
    } 
}

