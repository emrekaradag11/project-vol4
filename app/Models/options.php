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
            ->join("options_dtl","options.id","=","options_dtl.metadata")
            ->get();
    }

    public function set_opt($request){
        $dtl = new options_dtl();
        $dtl->setDtl($request);

        $s = "";
        foreach ($request->post("social") as $socials) {
            $s .= $socials . ",";
        }

        $this->updateOrCreate(
            [
                'id' => "1"
            ], [
                "url" => $request->post("siteUrl")[0],
                "socials" => $s
            ]
        );
    }

}
