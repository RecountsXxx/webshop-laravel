<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $product = Product::all();

        return view('home.index',['products'=>$product]);
    }
}
