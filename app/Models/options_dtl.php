<?php

namespace App\Models;

use App\Models\lang;
use Illuminate\Database\Eloquent\Model;

class options_dtl extends Model
{
    /*

    bu tablo options tablosunu dil'e göre listelemek içindir.
    #metadata       => options tablosu ile bağlantı yapmak için
    #title        => sitenin title'i için
    #keywords     => sitenin default keywords'ü için
    #description  => sitenin default Description'ı için
    #lang         => içerikleri dil'e göre ayırmak için

    */

    protected $table = "options_dtl";
    protected $guarded  = ["id"];

    public function setDtl($request){
        $lng = new lang();
        $lng = $lng->lang_short();
        foreach ($lng as $l => $k) {

            $this
                ->where('lang', $k->id)
                ->updateOrCreate(
                    [
                        'lang' => $k->id,
                    ], [
                        "metadata" => "1",
                        'lang' => $k->id,
                        "title" => $request["siteTitle"][$l],
                        "keywords" => $request["keywords"][$l],
                        "description" => $request["description"][$l],
                    ]
                );

        }
        return true;
    }



}
