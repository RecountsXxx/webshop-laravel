<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public static function cartCount(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $count = count($cart);

        return $count;
    }
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        return view('cart.index', ['cart' => $cart]);
    }
    public function addToCart(Request $request, $id)
    {
        $product = Product::where('id',$id)->first();

        $cart = $request->session()->get('cart', []);
        $cart[] = $product;
        $request->session()->put('cart', $cart);

        return redirect()->route('cart_index');
    }

    public function removeFromCart(Request $request, $index)
    {
        $cart = $request->session()->get('cart', []);


        if (isset($cart[$index])) {
            unset($cart[$index]);
            $request->session()->put('cart', array_values($cart));
        }

        return view('cart.index', ['cart' => $cart]);
    }
    public function clearCart(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->route('cart_index');
    }
}
