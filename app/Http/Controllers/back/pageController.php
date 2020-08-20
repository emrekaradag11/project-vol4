<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{add_field, pages, lang};
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function __construct()
    {
        view()->share('lng',lang::get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pages = pages::where("parent",0)->orderBy('ord')->get();
        return view('back.pages.list',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $parent = pages::get();
        return view(("back.pages.create") , compact("parent"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $pages = new pages();
        $response = $pages->set_pages($request);
        return redirect()->back()->with($response);
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

    public function edit($page_id)
    {
        $fieldModel = new add_field();
        $parent = pages::all();
        $page = pages::find($page_id);
        $fields = $fieldModel->getFieldWithPageId($page_id);
        return view(('back.pages.edit') , compact("fields","parent",'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $pages = new pages();
        $response = $pages->update_pages($request);
        return redirect()->back()->with($response);
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


    public function sortable(Request $request){

        if($request->ajax()){
            $pages = new pages();
            $response = $pages->change_order($request->post("data"));
        }
        return $response;

    }

    public function hidden(Request $request){
        if($request->ajax()){
            $pages = new pages();
            $response = $pages->changeHidden($request);
        }
        return $response;
    }











}
