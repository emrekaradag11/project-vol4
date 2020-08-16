<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{lang,tree,add_field,pages,field_data};
use Illuminate\Http\Request;

class treeController extends Controller
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
        return view('admin.tree.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($page_id = "")
    {
        $page = pages::find($page_id);
        $tree = tree::where("page_id" , $page_id)->get();
        $fields = add_field::where("page_id",$page_id)->get();
        return view(('back.tree.create') , compact("page","tree","fields"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tree = new tree();
        $response = $tree->set_tree($request);
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
        $page = pages::find($id);
        $tree = tree::where("page_id" , $id)->get();
        return view(('back.tree.index') , compact("page","tree"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$page_id)
    {
        $fieldModel = new add_field();
        $fieldDataModel = new field_data();
        $page = pages::find($page_id);
        $tree = tree::where("page_id" , $page_id)->get();
        $data = tree::where("id" , $id)->first();

        $fields = $fieldModel->getFieldWithPageId($page->id);
        $fieldData = $fieldDataModel->getFieldData($page->id,$id);

        return view(('back.tree.edit') , compact("page","tree","data","fields","fieldData"));
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
        $tree = new tree();
        $response = $tree->updateTree($request);
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
}
