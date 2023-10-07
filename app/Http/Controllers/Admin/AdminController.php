<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $products_count = Product::all()->count();
        $categories_count = Category::all()->count();
        $users_count = User::all()->count();
        return view('admim-panel.index',['products_count'=>$products_count, 'categories_count' =>$categories_count, 'users_count'=>$users_count]);
    }
}
