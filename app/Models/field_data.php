<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class field_data extends Model
{

    /*

    bu tablo tanımladığımız ek alanlara ait dataları, sayfalara ve diğer içeriklere uyarladığımız tablo
    örneğin; Beyaz Eşya isminde ve input text tipinde bir ek alanınız var.
    bu ek alan'a 1. dilde çamaşır makinesi, 2. dilde washing machine değerini girdiniz.
    bu değere ait tekrarlanmaması gereken ana kolonlarının depolandığı tablo burası.
    bu değerlerin dil'e göre depolandığı tablo ise field_data_dtl tablosudur.


    #parent => bu kolon , data eğer tree yapısında bir kayıt'a bağlıysa, bu kayıtla ilişkilendirmek için kullanılan alandır.
    #field_id => bu kolon eklemiş olduğumuz kayıt'ın hangi alan'a bağlı olduğunu gösterir.
    #page_id => bu kolon eklenen kayıt'ın bulunduğu sayfanın id'sini gösterir

     */


    protected $table = "field_data";
    protected $guarded  = ["id"];
}
