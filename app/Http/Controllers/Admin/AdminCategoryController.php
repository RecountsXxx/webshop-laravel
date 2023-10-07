<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admim-panel.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admim-panel.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->alias = strtolower($request->title);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file->move(public_path() . '/images', $category->title . '.img');
            $category->img = $category->title . '.img';
        }
        $category->save();

        return redirect()->back()->with('success',"Category his created");
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
        return view('admim-panel.categories.edit',['category' => Category::where('id',$id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category )
    {
        $category->title = $request->title;
        $category->description = $request->description;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file->move(public_path() . '/images', $category->title . '.img');
            $category->img = $category->title . '.img';
        }
        $category->save();

        return redirect()->back()->with('success',"Category his edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('Category will be deleted');
    }
}
