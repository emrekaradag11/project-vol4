<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class field_data_dtl extends Model
{

    /*

    bu tablo eklemiş olduğumuz ek alan kayıtlarını dil'e göre listelemek içindir.

    #metadata => field_data tablosu ile bağlamak içindir.
    #data => eklediğimiz data'yı temsil eder.
    #lang => data'nın bulunduğu dil'i temsil eder.

    */

    protected $table = "field_data_dtl";
    protected $guarded  = ["id"];


    public function setDtl($request,$metadata)
    {

        $lang = new lang();
        $lang = $lang->lang_short();

        foreach ($lang as $l => $k) {

            $data = new field_data_dtl();
            $data->metadata = $metadata;
            $data->data = $request[$l];
            $data->lang = $k->id;
            $data->save();

        }
        return true;

    }


}
