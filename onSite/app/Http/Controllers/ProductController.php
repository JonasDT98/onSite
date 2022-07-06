<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $prodcuts = \DB::table("products")->get();
        $data['products'] = $prodcuts;
        return view('home/index', $data);
    }

    public function show(\App\Models\Product $product){
        // $product = \DB::table("products")->where('id', $id)->first();
        $data['product'] = $product;
        return view('home/show', $data);
    }
}
