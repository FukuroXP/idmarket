<?php

namespace App\Http\Controllers;

use App\Attribute;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function bgf(Request $request, $id)
    {
        $request->validate([
            'background_front' => 'required',
        ]);

        $bgf = Attribute::where('id', $id)->first();

        if (file_exists(public_path('background_front/'.$bgf->backgroud_front))){
            Storage::delete(public_path('background_front/'.$bgf->backgroud_front));
        }


        $bgf->background_front = $request->background_front;
        $bgf->bgf_image = '0';

        if($request->hasFile('background_front')){
            $file = $request->file('background_front');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('background_front');
            $file->move($ServicesPath, $fileName);
            $bgf->background_front = $fileName;
            $bgf->bgf_image = '1';
        }
        $bgf->save();


        return redirect()->back();
    }

    public function bgb(Request $request, $id)
    {
        $request->validate([
            'background_back' => 'required',
        ]);

        $bgb = Attribute::where('id', $id)->first();
        $bgb->background_back = $request->background_back;
        $bgb->bgb_image = '0';

        if($request->hasFile('background_back')){
            $file = $request->file('background_back');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('background_back');
            $file->move($ServicesPath, $fileName);
            $bgb->background_back = $fileName;
            $bgb->bgb_image = '1';
        }
        $bgb->save();


        return redirect()->back();
    }

    public function pp(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required',
        ]);

        $pp = Attribute::where('id', $id)->first();

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time().'.'.$file->getClientOriginalName();
            $ServicesPath = public_path('photo');
            $file->move($ServicesPath, $fileName);
            $pp->photo = $fileName;
        }
        $pp->save();


        return redirect()->back();
    }

    public function text(Request $request, $id)
    {
//        $request->validate([
//            'font_color' => 'required',
//            'font_size' => 'required',
//        ]);

        $text = Attribute::where('id', $id)->first();
        $text->font_color = $request->font_color;
        $text->font_size = $request->font_size;
        $text->font_family = $request->font_family;
        $text->txt1 = $request->txt1;
        $text->txt2 = $request->txt2;
        $text->txt3 = $request->txt3;
        $text->txt4 = $request->txt4;
        $text->txt5 = $request->txt5;
        $text->txt6 = $request->txt6;
        $text->txt7 = $request->txt7;

        $text->save();


        return redirect()->back();
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'category_id',
        ]);

        $atts = new Attribute;
        $atts->category_id = $request->category_id;

        $atts->save();

//        dd($atts->id);

//        return redirect()->route('custome_name', ['id' => $atts->id]);

        return redirect()->action('CustomeController@name', ['id' => $atts->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        //
    }
}
