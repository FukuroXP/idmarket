<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();

        return view('product_create',compact('categories'));
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
            'descriptions' => 'required',
            'category_id' => 'required',
            'primary_image' => 'required',
            'file' => 'required'
        ]);

        $products = new Product;
        $products->name = $request->name;
        $products->descriptions = $request->descriptions;
        $products->price = $request->price;
        $products->category_id = $request->category_id;

        if($request->hasFile('primary_image')){
            $file = $request->file('primary_image');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('product_images');
            $file->move($ServicesPath, $fileName);
            $products->primary_image = $fileName;

        }

        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('file');
            $file->move($ServicesPath, $fileName);
            $products->file = $fileName;
        }

        //dd($products);

        $products->save();

        return redirect('/admin/product_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS catename')
            ->get();

        //dd($products);

        return view('product_show', compact('products'));
    }

    public function detail(Product $product, $id)
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS catename')
            ->where('products.id',$id)
            ->get();

        $products2 = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS catename')
            ->limit(2)
            ->orderBy('created_at', 'desc')
            ->get();



        //dd($products);

        return view('product_detail', compact('products', 'products2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $categories)
    {

        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS catename')
            ->where('products.id',$id)
            ->get();

        $categories = Category::all();

        return view('product_update',['products' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'descriptions' => 'required',
            'category_id' => 'required',
            'primary_image' => 'required',
            'file' => 'required'
        ]);

        $products = Product::where('id', $id)->first();
        $products->name = $request->name;
        $products->descriptions = $request->descriptions;
        $products->price = $request->price;
        $products->category_id = $request->category_id;

        if($request->hasFile('primary_image')){
            $file = $request->file('primary_image');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('product_images');
            $file->move($ServicesPath, $fileName);
            $products->primary_image = $fileName;
        }

        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('file');
            $file->move($ServicesPath, $fileName);
            $products->file = $fileName;
        }

        $products->save();

        return redirect('product_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();

        if ($product != null) {
            $product->delete();
            return redirect('/admin/product_show')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect('/admin/product_show')->with(['message'=> 'Wrong ID!!']);
    }
}
