<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
