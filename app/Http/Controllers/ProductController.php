<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($cat_id,$id){
        $item = Product::where('id',$id)->first();
        $products = Product::orderBy('created_at')->take(4)->get();
        return view('product.show',['item'=>$item,'products'=>$products]);
    }
    public function showCategory($cat_alias){
        $category = Category::where('alias',$cat_alias)->first();
        $products = Product::where('category_id',$category->id)->get();
        return view('category.index',['category' =>$category,'products'=>$products]);
    }
}
