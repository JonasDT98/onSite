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
            'images' => 'required',
            'category' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->sold = "0";
        $product->save();

        // if($request->has('images')){

        //     $path = 'public/prodcuct_images';

        //     foreach($request->input('images')as $image){
        //         // $imageName = $data['title'] . '-image-' . time().rand(1,1000) . '.' .$image->extention();
        //         $imageName = $request->input('image') . '_' . time().rand(1,1000);
        //         $image->move($path, $imageName);
                
        //         $image = new Picture();
        //         $image->image = $request->input('images')->guessExtension();
        //         $image->product_id = $product->id;
        //         $image->save();
        //     }
        // }
        

        $image = new Picture();
        $image->image = $request->input('image');
        $image->product_id = $product->id;
        $image->save();

        $request->flash();
        $request->session()->flash('message', 'The product ' . $request->input('name') . ' was added');

        return redirect('home/create');
    }


}
