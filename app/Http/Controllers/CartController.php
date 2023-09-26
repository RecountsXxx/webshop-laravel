<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('cart.index');
    }

    public function addToCart($id){
        return view('cart.index');
    }
}
