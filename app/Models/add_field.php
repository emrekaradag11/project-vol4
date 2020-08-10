<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class add_field extends Model
{
    /*

    #type     => bu kısım ek alanın tipini belirlemek içindir. örneğin 1 ise input, 2 ise selectbox vb.
    #page_id  => bu kısım pages tablosu ile eşleştirmek içindir. ek alanın bulunduğu sayfayı listelemek içindir.
    #ord      => ek alanlar arası sıralama yapmak içindir.
    #hidden   => bu alan dataları gizlemek içindir. 1 ise gizli
    #options  => bu alan ek alanın ekstra özelliklerini tanımlamak için

    #TYPE ÖZELLİKLERİ

    checkbox,       => çoklu özellik çoklu seçim
    color,          => renk seçimi
    date,           => tarih seçimi
    datetime-local, => tarih ve saat seçimi
    email,          => e-posta
    file,           => dosya
    month,          => ay seçimi
    number,         => sayı
    radio,          => çoklu özellik tekli seçim
    range,          => seçim aralığı
    tel,            => telefon
    text,           => yazı
    time,           => saat
    url,            => site url için
    week,           => bulunduğu hafta için

    */

    protected $table = "add_field";
    protected $guarded  = ["id"];



}
