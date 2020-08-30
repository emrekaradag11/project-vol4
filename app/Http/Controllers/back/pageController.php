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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function index()
    {
        $pages = pages::where("parent",0)->orderBy('ord')->get();
        return view('back.pages.list',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        $deleted_pages = new pages();
        $response = $deleted_pages->delete_page($id);
        return redirect()->back()->with($response);
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
