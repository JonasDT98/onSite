<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use \App\Models\picture;

class ProductController extends Controller
{
    public function index(){
        $prodcuts = \DB::table("products")->get();
        $data['products'] = $prodcuts->reverse();
        return view('home/index', $data);
    }

    public function show(\App\Models\Product $product){
        $data['product'] = $product;
        return view('home/show', $data);
    }

    public function create()
    {
        return view('home/create');
    }

    public function store(Request $request)
    {
        // fible oplossing zoek naar nieuwe oplossing!!!!!!!!!!
        // $size=$request->file('image')->getSize();
        // $name=$request->file('image')->getClientOriginalName();
        // $request->file('image')->store('public');

        $validated = $request->validate([
            'name' => 'required|max:200',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category' => 'required',

        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->sold = "0";
        $product->save();

        $image = new Picture();
        $image->image = $request->input('image');
        $image->product_id = $product->id;
        $image->save();

        $request->flash();

        return redirect('home/create');
    }


}
