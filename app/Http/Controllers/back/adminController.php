<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{options,lang};
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function get_index(){
        return view("back.index");
    }

    public function set_langs(Request $request){
        $lang = new lang();
        $lang->set_lang($request);
        return redirect()->back();
    }

    public function get_options(){
        $lng = new lang();
        $l = $lng->lang_short();
        $options = new options();
        $o = $options->get_options_data();
        return view("back.options")->with([
            "lng"=>$l,
            "options" => $o
        ]);
    }


}
