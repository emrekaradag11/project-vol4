<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tree extends Model
{

    /*

    Bu tablo tree şablonunda oluşturulan sayfalar için data barındırır.
    Örneğin Ürünler diye bir sayfamız var. buradaki page_id , pages tablosundaki id ile eşleşir,
    ve ürünler sayfasına ait dataları getirir.

    #parent   => bu alan tree yapısını kendi içerisinde kategorize etmek içindir.
    #type     => bu alan eğer 0 ise kategori 1 ise ürün olduğunu temsil eder.
    #page_id  => bu alan pages tablosu ile eşleşir ve bulunduğu sayfanın datalarını çeker.
    #hidden   => bu alan dataları gizlemek içindir. 1 ise gizli
    #ord      => bu alan datalar arası sıralama yapmak içindir

    */

    protected $table = "tree";
    protected $guarded  = ["id"];
}
