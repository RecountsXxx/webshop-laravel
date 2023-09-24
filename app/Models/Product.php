<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images(){
        return $this->hasMany('App\Models\ProductImage');
    }
    use HasFactory;
}
