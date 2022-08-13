<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use \App\Models\picture;
use Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        if (Session::has('loginId')){
            $prodcuts = \DB::table("products")->get();
            $data['products'] = $prodcuts->reverse();
            return view('home/index', $data);
        }else{
            return redirect('/login');
        }
    }

    public function show(\App\Models\Product $product){
        if (Session::has('loginId')){
            $data['product'] = $product;
            return view('home/show', $data);
        }else{
            return redirect('/login');
        }
    }

    public function create()
    {
        if (Session::has('loginId')){

            // if(! Gate::allows('create-product')){
            //     abort(403);
            // }
            return view('home/create');

        }else{
            return redirect('/login');
        }
    }

    public function store(Request $request)
    {
        if (Session::has('loginId')){
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
            }else{
                return redirect('/login');
            }
        }

        public function destroy($id){

            $product = \App\Models\Product::where('id', $id)->first();

            if(\Auth::user()->cannot('delete', $product)){
                abort(403);
            }
            
            \App\Models\Picture::where('product_id', $id)->delete();
            \App\Models\Product::destroy($id);
            
            return redirect('home/');
        }

        // public function update($id){

        //     if(\Auth::user()->cannot('update', $product)){
        //         abort(403);
        //     }
        //     \App\Models\Product::destroy($id);

        // }
}
