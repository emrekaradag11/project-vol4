<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class img extends Model
{

    /*

    #parent       => bağlı olduğu sayfanın veya tree'nin id'si için
    #img          => resmin adı için
    #page_id      => bulunduğu sayfanın id'si için
    #ord          => resimler arası sıralama yapmak için
    #hidden       => resimleri gizlemek için
    #type         => resmin tipini belirlemek için (1 ise ana görsel, 2 ise çoklu resim, 3 ise banner)

    */


    protected $table = "img";
    protected $guarded  = ["id"];
}
