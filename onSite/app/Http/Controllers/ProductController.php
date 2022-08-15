<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
use \App\Models\picture;
use \App\Models\User;
use Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        if (Session::has('loginId')){
            $products = \DB::table("products")->get();
            $data['products'] = $products->reverse();
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
                    'category' => 'required',
                ]);

                $product = new Product();
                $product->name = $request->input('name');
                $product->price = $request->input('price');
                $product->description = $request->input('description');
                $product->category = $request->input('category');
                $product->sold = "0";
                $product->user_id = Auth::id();
                $product->save();

                // if($request->has('image')){
                //     $path = 'public/product_images/';
                //     $image = $request->file('image');

                //     foreach($request->input('image') as $image){
                //         // $imageName = $data['title'] . '-image-' . time().rand(1,1000) . '.' .$image->extention();
                //         $imageName =  $image->getClientOriginalName();
                //         $image->move($path, $imageName);
                        
                //         $image = new Picture();
                //         $image->image = $request->input('images')->guessExtension();
                //         $image->product_id = $product->id;
                //         $image->save();
                //     }
                // }

                // $image = array();
                // if($files = $request->file('image')){
                //     foreach($files as $file){
                //         $image_name = md5(rand(1000, 10000));
                //         $ext = strtolower($file->getClientOriginalExtention());
                //         $image_full_name = $image_name . "." . $ext;
                //         $upload_path = "public/product_images/";
                //         $image_url = $upload_path . $image_full_name;
                //         $file->move($upload_path, $image_full_name);
                //         $image[] = $image_url;

                //     }
                // }

                // Picture::insert([
                //     'image' => implode('|', $image),
                //     'product_id' => '73'
                // ]);
                // return back();
                                        

                // $image = new Picture();
                // $image->image = $request->input('image');
                // $image->product_id = $product->id;
                // $image->save();

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
