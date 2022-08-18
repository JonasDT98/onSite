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


    public function selling(\App\Models\Product $product){
        if (Session::has('loginId')){
            $data['product'] = $product;
            return view('home/selling', $data);
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
                    
                if($request->has('images')){
                    foreach($request->file('images')as $image){
                        $imageName = '-image-'.time().rand(1,1000).'.'.$image->extension();
                        $image->move(public_path('product_images'),$imageName);

                        $image = new Picture();
                        $image->image = $imageName;
                        $image->product_id = $product->id;
                        $image->save();
                    }
                }

                $request->flash();
                $request->session()->flash('message', 'The product ' . $request->input('name') . ' was added');

                return redirect('home/create');
            }else{
                return redirect('/login');
            }
        }

        public function destroy(Request $request, $id){

            $product = \App\Models\Product::where('id', $id)->first();

            if(\Auth::user()->cannot('delete', $product)){
                $request->flash();
                $request->session()->flash('message', 'You cannot delete this product ');
                
                return back();
            }else{
                \App\Models\Picture::where('product_id', $id)->delete();
                \App\Models\Product::destroy($id);
                
                return redirect('home/');
            }
            
        }

        public function update(Request $request, $id){

            $product = \App\Models\Product::where('id', $id)->first();
            $picture = \App\Models\Picture::where('product_id', $product->id)->first();

            if(\Auth::user()->cannot('update', $product )){
                $request->flash();
                $request->session()->flash('message', 'You cannot update this product ');
                return back();
            }else{
                // dd($product->name);
                $data['product'] = $product;
                // dd($picture->image);
                $dataPicture['picture'] = $picture;
                return view('home/update',$data, $dataPicture);
            }          
        }

        public function put(Request $request, $id){
            
        }
}
