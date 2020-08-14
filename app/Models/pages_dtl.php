<?php

namespace App\Models;

use App\Models\lang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class pages_dtl extends Model
{
    /*

    bu tablo pages tablosunun verilerini dil'e göre listelemek içindir.

    #metadata     => pages tablosu ile bağlantı yapmak için
    #title        => sayfanın title'i için
    #slug         => sayfanın slug değeri için
    #description  => sayfanın default Description'ı için
    #keywords     => sayfanın default keywords'ü için
    #text         => sayfanın yazısı için
    #lang         => içerikleri dil'e göre ayırmak için

    */




    protected $table = "pages_dtl";
    protected $guarded  = ["id"];

    public function setDtl($request,$metadata)
    {
        $lang = new lang();
        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {
            $data = new pages_dtl();
            $data->metadata = $metadata;
            $data->title = $request->post("title")[$l];
            $data->slug = Str::slug($request->post("title")[$l], '-');
            $data->description = $request->post("description")[$l];
            $data->keywords = $request->post("keywords")[$l];
            $data->lang = $k->id;

            $data->save();

        }
        return true;
    }


    public function update_dtl($request,$metadata)
    {

        $lang = new lang();
        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {
            $this->
                updateOrCreate(
                    [
                        "metadata" => $metadata,
                        'lang' => $k->id
                    ], [
                        "title" => $request->post("title")[$l],
                        "slug" => Str::slug($request->post("title")[$l], '-'),
                        "description" => $request->post("description")[$l],
                        "keywords" => $request->post("keywords")[$l],
                    ]
                );
        }
        return true;

    }


    public function setTextDtl($request,$metadata)
    {

        $lang = new lang();
        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {
            $this->
                updateOrCreate(
                    [
                        "metadata" => $metadata,
                        'lang' => $k->id
                    ], [
                        "description" => $request->post("description")[$l],
                        "keywords" => $request->post("keywords")[$l],
                        "text" => $request->post("text")[$l],
                    ]
                );
        }
        return true;

    }


}
