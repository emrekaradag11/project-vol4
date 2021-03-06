<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\lang;

class add_field_dtl extends Model
{

    /*

    #metadata => bu kolon add_field tablosu ile birleştirmek içindir.
    #name => bu kısım ek alan başlığını dil'e göre değiştirmek içindir.
    #properties => bu kısım ek alana ait dil'e göre değişecek özelliklere belirtmek içindir.
    örneğin ; meyveler başlığı olarak checkbox olarak bi ek alan tanımlandı.
    bu ek alanın altına gelecek özellikler'in dil'e göre değişmesi gerekir. örneğin elma,armut,apple,banana gibi
    #lang => bu kolon data'nın bulunduğu dil', belirtir.

    */

    protected $table = "add_field_dtl";
    protected $guarded  = ["id"];



    public function setDtl($request,$metadata)
    {

        $lang = new lang();
        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {

            $data = new add_field_dtl();
            $data->metadata = $metadata;
            $data->name = $request->post("name")[$l];
            $data->properties = $request->post("properties")[$l];
            $data->lang = $k->id;
            $data->save();

        }
        return true;

    }


    public function updateDtl($request,$metadata)
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
                        "metadata" => $metadata,
                        "name" => $request->post("name")[$l],
                        "properties" => $request->post("properties")[$l],
                    ]
                );

        }
        return true;

    }

    public function getFieldDetailWithId($metadata)
    {

        return
            $this->
            where("metadata",$metadata)
                ->get();

    }

}
