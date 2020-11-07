<?php

namespace App\Http\Controllers;

use App\Category;
use App\Custome;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')
            ->select('categories.*')
            ->where('categories.customizable','1')
            ->get();
        return view('custome_layout', compact('categories'));
    }

    public function myCustome()
    {

        $customes = DB::table('customes')
            ->select('customes.*')
            ->where('customes.user_id',auth()->id())
            ->get();

        return view('my_custome', compact('customes'));
    }

    public function custome($id, $attid)
    {
        $custome = DB::table("customes")
            ->join('attributes','attributes.id','=','attribute_id')
            ->join('categories','categories.id','=','attributes.category_id')
//            ->join('users','users.id','=','user_id')
            ->select('customes.*',
                'attributes.*',
                'categories.*')
            ->where('customes.id',$id)
            ->where('attributes.id',$attid)
            ->where('user_id',auth()->id())
            ->get();

        return view('custome_attribute',['customes' => $custome]);
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
            'attribute_id' => 'required',
            'user_id' => 'required',
        ]);


        $customes = new custome;
        $customes->name = $request->name;
        $customes->attribute_id = $request->attribute_id;
        $customes->user_id = $request->user_id;

        $customes->save();

        return redirect()->action('CustomeController@custome', ['id' => $customes->id, 'attid' => $customes->attribute_id]);
    }

    public function name($id)
    {
        $att = DB::table('attributes')
            ->select('attributes.*')
            ->where('attributes.id',$id)
            ->get();


        return view('custome_name',['attributes' => $att]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Custome  $custome
     * @return \Illuminate\Http\Response
     */
    public function show(Custome $custome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Custome  $custome
     * @return \Illuminate\Http\Response
     */
    public function edit(Custome $custome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Custome  $custome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Custome $custome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Custome  $custome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Custome $custome)
    {
        //
    }
}
