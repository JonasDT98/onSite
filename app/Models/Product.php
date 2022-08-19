<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['picture'];

    public function picture(){
        return $this->hasMany(\App\Models\Picture::class);
    }
}
