<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('admim-panel.products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admim-panel.products.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        if(isset($request->new_price)){
            $product->new_price = $request->new_price;
        }
        $product->in_stock = 1;
        if($request->input('stock') == 'No'){
            $product->in_stock = 0;
        }
        $product->category_id = $request->input('category_id');
        $product->save();
        if($request->hasFile('image')){
            foreach($request->file('image') as $key => $image){
                $product_images = new ProductImage();
                $file = $image;
                $file->move(public_path() . '/images', $product->title . $key . '.jpg');
                $product_images->img = $product->title . $key .'.jpg';
                $product_images->product_id = Product::where("title",$product->title)->first()->id;
                $product_images->save();
            }
    }

        return redirect()->back()->with('success',"Product his added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admim-panel.products.edit',['product'=>Product::where('id',$id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        if(isset($request->new_price)){
            $product->new_price = $request->new_price;
        }
        $product->in_stock = 1;
        if($request->input('stock') == 'No'){
            $product->in_stock = 0;
        }
        $product->category_id = $request->input('category_id');
        $product->save();
        if($request->hasFile('image')){
            foreach($request->file('image') as $key => $image){
                $product_images = new ProductImage();
                $file = $image;
                $file->move(public_path() . '/images', $product->title . $key . '.jpg');
                $product_images->img = $product->title . $key .'.jpg';
                $product_images->product_id = Product::where("title",$product->title)->first()->id;
                $product_images->save();
            }
        }
        return redirect()->back()->with('success',"Product his edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success',"Product his be deleted");
    }
}
