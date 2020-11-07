<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category_create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'l' =>'required',
            'w' => 'required',
            'descriptions' => 'required',
            'customizable' => 'required'
        ]);

        $categories = new category;
        $categories->name = $request->name;
        $categories->l = $request->l;
        $categories->w = $request->w;
        $categories->descriptions = $request->descriptions;
        $categories->customizable = $request->customizable;

        $categories->save();

        return redirect('/category_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::all();

        return view('category_show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->where('id',$id)->get();
        return view('category_update',['categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'l' =>'required',
            'w' => 'required',
            'descriptions' => 'required',
            'customizable' => 'required'
        ]);

        $categories = Category::where('id', $id)->first();
        $categories->name = $request->name;
        $categories->l = $request->l;
        $categories->w = $request->w;
        $categories->descriptions = $request->descriptions;
        $categories->customizable = $request->customizable;


        $categories->save();

        return redirect('/category_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =Category::where('id',$id)->first();

        if ($category != null) {
            $category->delete();
            return redirect('/category_show')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect('/category_show')->with(['message'=> 'Wrong ID!!']);
    }

}
