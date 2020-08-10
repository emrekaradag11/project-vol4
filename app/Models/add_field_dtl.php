<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
