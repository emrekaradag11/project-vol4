<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class template extends Model
{

    /*

    bu tablo pages tablosundaki verilerin şablonunu belirler.
    şablon id'si 1 ise text
    şablon id'si 2 ise tree
    şablon id'si 3 ise çoklu resim anlamına gelir

    */



    protected $table = "template";
    protected $guarded  = ["id"];
}
