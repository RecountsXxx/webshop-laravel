<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($cat_id,$id){
        $item = Product::where('id',$id)->first();
        $products = Product::all();
        return view('product.show',['item'=>$item,'products'=>$products]);
    }
}
