<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{add_field, field_data, pages, lang, img};
use Illuminate\Http\Request;

class textController extends Controller
{

    public function __construct()
    {
        view()->share('lng', lang::get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
        $fieldModel = new add_field();
        $fieldDataModel = new field_data();
        $page = pages::find($id);
        $fields = $fieldModel->getFieldWithPageId($id);
        $fieldData = $fieldDataModel->getFieldData($page->id,$page->id);
        $images = new img();
        $img = $images->getImg($id,$id,2);
        $homeImg = $images->getImg($id,$id,1);

        return view(('back.text.edit') , compact('fields','page','fieldData','img','homeImg'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $pages = new pages();
        $imgModel = new img();
        $imgModel->set_img($request);
        $pages->setText($request);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
