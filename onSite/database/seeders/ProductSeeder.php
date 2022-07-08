<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Models\Product();
        $product->name = "ps3";
        $product->price = "19";
        $product->description = "ik ben een ps3";
        $product->category = "gaming";
        $product->sold = "no";
        $product->save();

    }
}
