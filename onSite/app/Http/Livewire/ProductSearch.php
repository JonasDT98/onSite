<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductSearch extends Component
{

    public $search;
    public $products = [];

    public function mount(){
        $this->products = \App\Models\Product::all()->reverse();
    }

    public function search(){
        $this->products = \App\Models\Product::where('name', 'LIKE', "%{$this->search}%")
        ->orWhere('description', 'LIKE', "%{$this->search}%")->get();
        ;
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
