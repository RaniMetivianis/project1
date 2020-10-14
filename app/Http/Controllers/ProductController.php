<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
}

