<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product:: all();
        return $products;
    }

    public function show($id)
    {
        $products = Product:: find($id);
        if($products){
            return $products;   
        }else{
            return response()->json([
                'message' => 'Produk Tidak Ditemukan'
            ], 404); 
        }
    
    } 
}

