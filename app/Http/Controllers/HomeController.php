<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Fproducts = DB::table('products')
            ->select('products.*')
            ->where('products.price',null)
            ->orderBy('products.created_at', 'DESC')
            ->limit(8)
            ->get();

        $Pproducts = DB::table('products')
            ->select('products.*')
            ->where('products.price','!=',null)
            ->orderBy('products.created_at', 'DESC')
            ->limit(8)
            ->get();

        return view('home', compact('Fproducts','Pproducts'));
    }

    public function allFree()
    {
        $products = DB::table('products')
            ->select('products.*')
            ->where('products.price',null)
            ->orderBy('products.created_at', 'DESC')
            ->get();

        return view('all_products', compact('products'));
    }

    public function allPay()
    {
        $products = DB::table('products')
            ->select('products.*')
            ->where('products.price','!=',null)
            ->orderBy('products.created_at', 'DESC')
            ->get();

        return view('all_products', compact('products'));
    }

    public function search()
    {
        $key = Input::get('key');

        $products = DB::table('products')
            ->select('products.*')
            ->where('products.name','like', '%'.$key.'%')
            ->get();

        return view('all_products', compact('products'));
    }

}
