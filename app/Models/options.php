<?php

namespace App\Models;

use App\Models\options_dtl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class options extends Model
{

    /*

     bu tablo sitenin genel ayarlarının bulunduğu kayıtlar içindir.

     #socials     => sosyal medyalar için
     #newsletter  => e bülten e-postaları için
     #url         => sitenin url'i için

    */


    protected $table = "options";
    protected $guarded  = ["id"];

    public function get_options_data(){
        return $this
            ->where("id","1")
            ->first();
    }

    public function set_opt($request){
        $dtl = new options_dtl();
        $dtl->setDtl($request);
        $this->updateOrCreate(
            [
                'id' => "1"
            ], [
                "url" => $request->post("siteUrl"),
                "socials" => collect($request->post("social"))
            ]
        );
    }


    public function getDetail() {
        return $this->hasMany('App\Models\options_dtl','metadata','id');
    }


}
