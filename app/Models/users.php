<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{

    /*

    laravel'in default users tablosu ise admin paneline bağlanmak için kullanıyoruz.

    #name => kullanıcının ismi içindir
    #email => kullanıcının yönetim paneline giriş yaparken kullanacağı e-posta adresi içindir.
    #managed_pages => bu kısım yönetim panelinde kullanıcının yönetebileceği sayfaları belirlemek içindir.
    bu kolonda pages tablosundaki sayfaların id'si ile eşleşir.
    #permissions => bu kolon kullanıcının ekleme,silme,okuma gibi izinleri tanımlamak için kullanılır.
    #auth => bu kolon yetkilendirilen kullanıcının konumunu belirle.
    ÖRN ; 1 ise admin 2 ise alt kullanıcı

    */

    protected $table = "users";
    protected $guarded  = ["id"];
}
