<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pages extends Model
{

    /*
     #parent    => sayfaları tree mantığı ile bağlamak için
     #template  => sayfaların şablonlarını belirlemek için (Tree,text,img vs)
     #redirect  => hiç sayfa olmadan yönlendirme yapmak için (ÖRN:www.google.com)
     #hidden    => bu alan sayfaları gizlemek içindir. 1 ise gizli
     #ord       => sayfalar arası sıralama yapmak için
     */



    protected $table = "pages";
    protected $guarded  = ["id"];
}
