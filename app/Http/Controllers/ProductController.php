<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($cat_id, $id)
    {
        $item = Product::where('id', $id)->first();
        $products = Product::orderBy('created_at')->take(4)->get();
        return view('product.show', ['item' => $item, 'products' => $products]);
    }

    public function showCategory(Request $request, $cat_alias)
    {
        $cat = Category::where('alias', $cat_alias)->first();
        $products = Product::where('category_id', $cat->id)->get();

        if(isset($request->orderBy)){
            if($request->orderBy == 'price-low-high'){
                $products = Product::where('category_id',$cat->id)->orderBy('price')->get();
            }
            if($request->orderBy == 'price-high-low'){
                $products = Product::where('category_id',$cat->id)->orderBy('price','desc')->get();
            }
            if($request->orderBy == 'name-a-z'){
                $products = Product::where('category_id',$cat->id)->orderBy('title')->get();
            }
            if($request->orderBy == 'name-z-a'){
                $products = Product::where('category_id',$cat->id)->orderBy('title','desc')->get();
            }
        }

        if($request->ajax()){
            return view('ajax.order-by', [
                'category' => $cat,
                'products' => $products,
            ])->render();
        }
        return view('category.index', [
            'category' => $cat,
            'products' => $products,
        ]);
    }
}
